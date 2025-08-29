<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSettingCreateRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'name'  => 'required|string|min:3|max:255',
            'phone' => [
                'required',
                'string',
                'unique:users,phone'
            ],
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages(): array{
        return [
            'name.required'  => 'F.I.O kiritilishi shart!',
            'name.min'       => 'F.I.O kamida 3 ta belgidan iborat bo‘lishi kerak!',
            'phone.required' => 'Telefon raqam kiritilishi shart!',
            'phone.regex'    => 'Telefon raqam +998 bilan boshlanishi va 12 ta belgidan iborat bo‘lishi kerak!',
            'phone.unique'   => 'Bu telefon raqam allaqachon mavjud!',
            'email.required' => 'Email kiritilishi shart!',
            'email.email'    => 'Email to‘g‘ri formatda bo‘lishi kerak!',
            'email.unique'   => 'Bu email allaqachon mavjud!',
        ];
    }
}
