<?php
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreUserPost;
use App\Mail\StoreUserConfirm;

use App\Models\User;

class AuthController extends Controller
{

    use RegistersUsers;

    function login() {
        $credentials = request(['email', 'password']);
 
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
 
        return $this->respondWithToken($token);
    }

    public function register(StoreUserPost $request) {

        \DB::beginTransaction();
        try {
            event(new Registered($user = $this->create($request->all())));
            Mail::to($user)->send(new StoreUserConfirm($user));
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
            report($e);
            return response()->json(['message' => 'エラーが発生しました']);
        }
        return response()->json(['message' => 'メールを送信しました']);
    }

    public function showComplete() {
        return response()->json(['message' => 'メールを送信しました']);
    }

    public function confirmMail(Request $request) {
        \DB::beginTransaction();
        try {
            $verified = $request->input('verified');
            if (is_null($verified)) {
                abort(500, 'パラメータが不正です');
            }
            $user = User::where('mail_verified_hash', $verified)->first();
            if (is_null($user)) {
                abort(500, '登録情報が見つかりませんでした');
            }
            if (!is_null($user->email_verified_at)) {
                abort(404);
            }
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->save();
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
            report($e);
            return response()->json(['message' => 'エラーが発生しました']);
        }
        $this->guard()->login($user);
        return redirect('/');
    }

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mail_verified_hash' => (string) Str::uuid(),
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'ログアウトしました。']);
    }
 
    public function me()
    {
        return response()->json(auth()->user());
    }
 
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }

    public function getCurrentUser() {
       return response()->json([
           'authenticated' => \Auth::guard('api')->check(),
           'user' => \Auth::guard('api')->user(),
       ]);
    }
}
