<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:5|unique:posts",
            "category" => "required|exists:categories,id",
            "description" => "required|min:30",
            "photos" => "required",
            "photos.*" => "mimes:png,jpg,jpeg|max:1024",
            "featured_image" => "nullable|mimes:png,jpg,jpeg|file|max:1024"
        ];
    }
}
