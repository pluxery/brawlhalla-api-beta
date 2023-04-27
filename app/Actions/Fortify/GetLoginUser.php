<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\LoginResponse;

class GetLoginUser
{
    public function login(array $input)
    {
        $user = User::where('email', $input["email"])->first();
        if ($user && Hash::check($input["password"], $user->password)) {
            return $user;
        }
    }
}
