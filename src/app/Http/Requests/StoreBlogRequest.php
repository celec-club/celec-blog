<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required',
            'user_id' => 'required|exists:users,id',
            'cover' => 'required|mimes:jpg,jpeg',
        ];
    }
}
