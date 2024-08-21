<?php

namespace App\Http\Controllers;



use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(Register $register)
    {

        $verify_token = Str::random(55);

        User::create([
            'name'=>$register->name,
            'email'=>$register->email,
            'password'=>Hash::make($register->password),
            'verify_token'=> $verify_token
        ]);
        return redirect()->back();
    }
    public function login()
    {
        return view('auth.login');
    }
}
