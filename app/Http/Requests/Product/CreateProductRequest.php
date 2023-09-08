<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'productName' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'imgUrl' => 'required|string|max:255',
            'categoryId' => 'required|integer',
            'discount' => 'required|integer',
            'quantity' => 'required|integer|min:0|max:100',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
