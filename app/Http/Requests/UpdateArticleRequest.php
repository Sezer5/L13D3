<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|unique:articles,name,'.$this->article->id,
            'desc' => 'required|max:5000',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'The title field is required',
            'desc.max' => 'The description field is not must be greater than : max characters',
            'thumbnail.max' => 'The thumbnail must not be greater than 2MB',
            'thumbnail.image' => 'The thumbnail must be an image',
        ];
    }
}
