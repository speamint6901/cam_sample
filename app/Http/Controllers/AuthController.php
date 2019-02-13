<?php
namespace App\Http\Controllers;
 
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreUserPost;
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
        event(new Registered($user = $this->create($request->all())));
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
