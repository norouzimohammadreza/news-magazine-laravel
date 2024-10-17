<?php

namespace App\Http\Requests\Api\Admin\Menu;

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
            'title' => 'required|min:3|max:50',
            'url' => 'required|url'
        ];
    }
}
