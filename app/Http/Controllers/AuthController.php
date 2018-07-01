<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use JWTAuthException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['login', 'password']);    
        try
        {
            if (! $token = auth()->attempt($credentials)) 
            {
                return response()->json(['error' => 'Login ou senha incorretos'], 401);
            }
        }
        catch(JWTAuthException $e)
        {
            response()->json(['error' => 'Nao foi possivel gerar o token'], 500);
        }
         

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logout feito com sucesso']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'message' => 'Login feito com sucesso',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}