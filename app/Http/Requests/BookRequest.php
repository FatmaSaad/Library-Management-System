<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            "name" => "required|string|max:191",
            "description" => "nullable|string",
            "category_id" => "required|integer|exists:categories,id",
            "price" => "required|numeric|min:0",
            "quantity" => "required|numeric|min:0",
            "auther" => 'required|string',
            "image" => 'required_without:_method|image',
        ];
    }
}
