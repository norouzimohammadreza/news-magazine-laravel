<?php

namespace App\Http\Requests\Api\Admin\User;

use App\RestfulApi\ApiFormRequest;


class UserStoreRequest extends ApiFormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin'=>'required'
        ];
    }
}
