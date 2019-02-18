<?php
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Hash;
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

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
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
}
