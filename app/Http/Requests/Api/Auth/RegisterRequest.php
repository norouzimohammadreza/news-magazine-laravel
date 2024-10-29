<?php

namespace App\Http\Requests\Api\Auth;

use App\RestfulApi\ApiFormRequest;

class RegisterRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:50|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|max:48|confirmed',
            'password_confirmation' => 'required|min:8|max:48|same:password|regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$^',
        ];
    }
}
