<?php

namespace App\Http\Controllers;



use App\Http\Requests\Auth\Register;
use App\Models\User;
use App\Http\Requests\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        return redirect()->route('sendMail',[
           'token'=> $verify_token,
            'email' =>$register->email
        ]);
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
    public function sendMail($token,$email)
    {
        $text = 'for verify your email </br>
please click on the link below to verify account
<a href="'. route('verifyAccount', $token );'"> verify account</a>';
       Mail::raw($text, function ($message) use ($email) {
           $message->to($email)->subject('Verify Account');
       });
        return redirect('login')->with('verifyMessage','Please check your email to verify your account');

    }
    public function verifyAccount($token)
    {
       $user= User::where('verify_token',$token)->first();
       $user->is_active = 1;
        $user->save();
        if ($user->is_active){
        return redirect('login')->with('verifyMessage','Your account is verified');

    }}
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
