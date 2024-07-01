<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;


class AuthService {

    public function login($data)
    {
        $credentials = ['email' => $data->email, 'password' => $data->password];
        if (! $token = auth()->claims($this->getClaims($data->email))->attempt($credentials)) {
            throw new UnauthorizedException("Credenciales incorrectas");
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return true;
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    private function getClaims($email)
    {
        $user = User::where('email', $email)->first();
        return [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role
        ];
    }
}