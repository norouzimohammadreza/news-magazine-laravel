<?php

namespace App\Http\Requests\Api\Admin\Banner;

use App\RestfulApi\ApiFormRequest;

class Store extends ApiFormRequest
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
            'url'=>'required|url',
            'image'=>'required|image|max:512'
        ];
    }
}
