<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{
    public function Register(array $register): ServiceResult
    {
        $verify_token = Str::random(55);
        $user = User::create([
            'name'=>$register['name'],
            'email'=>$register['email'],
            'password'=>Hash::make($register['password']),
            'verify_token'=> $verify_token
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return new ServiceResult(true,[
            'token' => $token,
            'user' => $user
        ]);
    }
    public function Login(array $login): ServiceResult{
        $user = User::where('email',$login['email'])->first();
        if(!Hash::check($login['password'],$user->password)){
            return new ServiceResult(false,[
                'passwordCheck' => false
            ]);
        }
        if (!$user->is_active){
            return new ServiceResult(false,[
                'userActive' => false
            ]);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return new ServiceResult(true,[
            'token' => $token,
            'user' => $user,
            'userActive' => true,
            'passwordCheck' => true
        ]);
    }
    public function sendMail(string $token,string $email)
    {

    }

}
