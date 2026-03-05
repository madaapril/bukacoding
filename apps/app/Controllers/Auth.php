<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function syarat_ketentuan()
    {
        return view('syarat_ketentuan');
    }

    public function forgot_password()
    {
        return view('auth/forgot_password');
    }
}
