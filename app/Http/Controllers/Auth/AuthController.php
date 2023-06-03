<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceControllers\UserController;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'refresh']]);
    }

    public function register(StoreRequest $request): JsonResponse
    {

        $data = $request->validated();

        $data['avatar'] = 'users/default_avatar_bodwar.png';
        $user = User::create($data);
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'login error'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'login error'], 401);
        }
//        $cookie = cookie('access_token', $token, 60);
        return $this->respondWithToken($token);
    }

    public function me(): UserResource
    {
        return new UserResource(auth()->user());
    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->me(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
