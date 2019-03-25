<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'description'=>'required',
            'content'=>'required',
            'slug'=>'required',
            'title'=>'required',

            // 'user'=>'required',
            // 'category'=>'required',
            'thumbnail'=>'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'title.max' => 'Title is required!',
            'description.required' => 'Description is required!',
            'description.max' => 'Description is too long!',
            'content.required' => 'Content is required!',
            'slug.required' => 'Slug is required!',
            'slug.max' => 'Slug is too long!',
            // 'category.required' => 'Category is required!',
            'thumbnail.required' => 'Thumbnail is required!'
        ];
    }
}
