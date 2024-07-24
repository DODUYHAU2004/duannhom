<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLoginRequest extends FormRequest
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
            "password" => "required"
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống tên đăng nhập',
            'password.required' => 'Không được để trống mật khẩu'
        ];
    }
}