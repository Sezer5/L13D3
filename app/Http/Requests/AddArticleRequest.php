<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddArticleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:1|unique:articles',
            'desc' => 'required|max:5000',
            'category_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required',
            'desc.required' => 'Description field is required',
            'category_id.required' => 'Category field is required',
            'thumbnail.max' => 'The thumbnail must not greater than 2MB',
            'thumbnail.image' => 'The thumbnail must be an image'
        ];
    }
}
