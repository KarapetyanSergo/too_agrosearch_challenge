<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $service): JsonResponse
    {
        $user = $service->createUser($request->name, $request->email, $request->password);

        return response()->json([
            'user' => $user,
            'token' => $service->createToken($user, 'auth'),
        ]);
    }

    public function login(LoginRequest $request, AuthService $service): JsonResponse
    {
        $user = $service->checkAndGetUser($request->email, $request->password);

        if (!$user) {
            return response()->json([
                'message' => 'Wrong email or password'
            ], 400);
        }

        return response()->json([
            'user' => $user,
            'token' => $service->createToken($user, 'auth'),
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
