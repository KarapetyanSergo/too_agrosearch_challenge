<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(string $name, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public function createToken(User $user, string $tokenName): string
    {
        return $user->createToken($tokenName)->plainTextToken;
    }

    public function checkAndGetUser(string $email, string $password): ?User
    {
        $user = User::where('email', $email)
        ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        return $user;
    }
}
