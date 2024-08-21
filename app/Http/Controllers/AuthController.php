<?php

namespace App\Http\Controllers;



class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

}
