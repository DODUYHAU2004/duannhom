<?php

namespace App\Http\Requests\SanPhams;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateRequest extends FormRequest
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
            "name" => "required",
            "price" => "required|integer|min:1000",
            "quantity" => "required|integer|min:1",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống sản phẩm',
            'price.required' => 'Không được để trống giá',
            'price.integer' => 'Giá phải là số nguyên',
            'price.min' => 'Giá nhỏ nhất phải trên 1000',
            'quantity.required' => 'Không được để trống số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng nhỏ nhất phải trên 1',
        ];
    }
}