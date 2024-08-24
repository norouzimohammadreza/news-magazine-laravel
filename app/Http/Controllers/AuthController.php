<?php

namespace App\Http\Controllers;



use App\Http\Requests\Auth\Register;
use App\Models\User;
use App\Http\Requests\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register()
    {
            return view('auth.register');

}
    public function registerStore(Register $register)
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
    public function loginStore(Login $login)
    {
        $user = User::where('email',$login->email)->first();

        if(!Hash::check($login->password,$user->password)){
            return redirect()->back()->with('error','Password is wrong.');
        }

        if (!$user->is_active){
            return redirect()->back()->with('error','This account is not verified yet');
        }

        //do stuff
        Auth::login($user);
        return redirect('/');
    }
    public function verifyAccount()
    {
    
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
