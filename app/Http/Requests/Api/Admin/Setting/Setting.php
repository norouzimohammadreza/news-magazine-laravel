<?php

namespace App\Http\Requests\Api\Admin\Setting;

use App\RestfulApi\ApiFormRequest;

class Setting extends ApiFormRequest
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
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:10|max:150',
            'keyword' => 'required|min:5|max:100',
            'logo' => 'file|image|max:512',
            'icon' => 'file|image|max:512'
        ];
    }
}
