<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthService
{


    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login($email, $password)
    {
        return Auth::guard('users')->attempt(['email' => $email, 'password' => $password]);
    }


}