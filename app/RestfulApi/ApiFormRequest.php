<?php

namespace App\RestfulApi;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        if (request()->expectsJson())
            throw new HttpResponseException(response()->json($validator->errors(), 422));
            parent::failedValidation($validator);
    }
}
