<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                'productName' => 'string|max:255',
                'description' => 'string|max:1000',
                'imgUrl' => 'string|max:255',
                'categoryId' => 'integer',
                'discount' => 'integer',
                'quantity' => 'integer|min:0|max:100',
                'price' => 'regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
