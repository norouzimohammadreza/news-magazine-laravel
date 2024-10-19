<?php

namespace App\Http\Requests\Api\Admin\Post;

use App\RestfulApi\ApiFormRequest;

class PostStoreRequest extends ApiFormRequest
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
            'title' => 'required|min:5|max:100',
            'summary' => 'required',
            'body' => 'required',
            'published_at' => 'required',
            'image' => 'required|image|max:512',
            'category_id' => 'required',
        ];
    }
}
