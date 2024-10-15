<?php

namespace App\Http\Controllers;



use App\Http\Requests\Auth\ForgotPassword;
use App\Http\Requests\Auth\PasswordConfirmation;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use App\Http\Requests\Auth\Login;
use App\Services\AuthService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }
    public function register()
    {
            return view('auth.register');

}
    public function registerStore(Register $register)
    {
        $this->authService->Register($register->all());
        return redirect('login')->with('verifyMessage','Please check your email to verify your account');


    }
    public function login()
    {
        return view('auth.login');
    }
    public function loginStore(Login $login)
    {
        $result = $this->authService->login($login->all());
        if (isset($result->data['passwordCheck'])){
            if(!$result->data['passwordCheck']){
                return redirect()->back()->with('error','Password is wrong.');
            }
        }
        if (isset($result->data['userActive'])){
        if (!$result->data['userActive']){
            return redirect()->back()->with('error','This account is not verified yet');
        }}

        //do stuff
        Auth::login($result->data['user']);
        return redirect('/');
    }
    public function verifyAccount($token)
    {
        $this->authService->verifyAccount($token);
       return redirect('login')->with('verifyMessage','Your account is verified');
    }
    public function logout()
    {
        $this->authService->logout();
        return redirect('/');
    }
    public function resetPassword(){
        return view('auth.reset-password');
}
    public function forgotPassword(ForgotPassword $forgotPassword)
{
    $result = $this->authService->forgetPassword($forgotPassword->all());
    if (isset($result->data['userActive'])){
        if (!$result->data['userActive']){
            return redirect()->back()->with('error','This account is not verified yet');
        }}
    if (isset($result->data['tokenExpired'])){
        if ($result->data['tokenExpired']){
            return redirect()->back()->with('error','This token is expired yet');
        }}
    return redirect('reset-password')->with('verifyMessage','Please check your email to receive new password');
}

    public function newPassword($token)
    {
        $user = User::where('forget_token',$token)->first();

        if ($user->forget_token_expire < now()){
            return redirect('reset-password')->with('error','Your token is Expired');
        }
        return view('auth.new-password',compact('token'));
    }
    public function confirmPassword(PasswordConfirmation $confirmation,$token){
        $user =  User::where('forget_token',$token)->first();
        $user->password = Hash::make($confirmation->password);
        $user->save();
        return redirect('login')->with('verifyMessage','Your password has been changed');
    }

}

