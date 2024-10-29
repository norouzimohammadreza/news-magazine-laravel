<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthService
{
    public function Register(RegisterRequest $request): ServiceResult
    {
        $validated = $request->validated();
        $verify_token = Str::random(55);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'verify_token' => $verify_token
        ]);
        $user->createToken('auth_token')->plainTextToken;
        $this->sendMail($user['verify_token'], $user['email']);
        return new ServiceResult(true);
    }

    public function Login(array $request): ServiceResult
    {
        $user = User::where('email', $request['email'])->first();
        if (!Hash::check($request['password'], $user->password)) {
            return new ServiceResult(false, [
                'passwordCheck' => false
            ]);
        }
        if (!$user->is_active) {
            return new ServiceResult(false, [
                'userActive' => false
            ]);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return new ServiceResult(true, [
            'token' => $token,
            'user' => $user,
            'userActive' => true,
            'passwordCheck' => true
        ]);
    }

    public function logout(): ServiceResult
    {
        Auth::logout();
        return new ServiceResult(true);
    }

    public function sendMail(string $token, string $email)
    {
        $text = 'for verify your email </br>
please click on the link below to verify account
<a href="' . route('verifyAccount', $token);
        '"> verify account</a>';
        Mail::raw($text, function ($message) use ($email) {
            $message->to($email)->subject('Verify Account');
        });
        return new ServiceResult(true);
    }

    public function verifyAccount(string $token): ServiceResult
    {
        $user = User::where('verify_token', $token)->first();
        $user->is_active = 1;
        $user->save();
        return new ServiceResult(true);
    }

    public function forgetPassword(array $request): ServiceResult
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user->forget_token_expire == null && $user->forget_token_expire > now()) {
            return new ServiceResult(false, [
                'tokenExpired' => true
            ]);
        }
        if ($user->is_active == 0) {
            return new ServiceResult(false, [
                'userActive' => false
            ]);
        }
        $user->forget_token = Str::random(55);
        $user->forget_token_expire = now()->addMinutes(60);
        $user->save();
        $this->sendForgotPassword($user->forget_token, $request['email']);
        return new ServiceResult(true);
    }

    public function sendForgotPassword(string $token, string $email): ServiceResult
    {
        $text = 'for verify your email </br>
        please click on the link below to receive new password
        <a href="' . route('newPassword', $token);
        '"> New Password account</a>';
        Mail::raw($text, function ($message) use ($email) {
            $message->to($email)->subject('New Password');
        });
        return new ServiceResult(true);
    }

    public function confirmPassword(array $request, string $token): ServiceResult
    {
        $user = User::where('forget_token', $token)->first();
        if (!$user->forget_token_expire == null && $user->forget_token_expire < now()) {
            return new ServiceResult(false, [
                'tokenExpired' => true
            ]);
        }
        $user->password = Hash::make($request['password']);
        $user->save();
        return new ServiceResult(true);

    }
}
