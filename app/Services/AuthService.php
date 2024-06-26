<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function login($data)
    {
        $user = User::where('email', $data->email)->select('id', 'email', 'password', 'role')->first();
        if (!$user || !Hash::check($data->password, $user->password)) throw new UnauthorizedException('Credenciales incorrectas');

        $token = $user->createToken('auth_token', ['email' => $user->email, 'role' => $user->role]);

        return $token->plainTextToken;
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $user->tokens()->delete();
        } else {
            throw new UnauthorizedException('No hay usuario autenticado');
        }
    }
}