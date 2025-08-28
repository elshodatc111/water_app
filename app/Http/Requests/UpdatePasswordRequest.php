<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest{
    public function authorize(): bool{
        return true; // Faqat logindan o‘tgan foydalanuvchilar uchun tekshirsa ham bo‘ladi
    }
    public function rules(): array{
        return [
            'id' => ['required'],
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }
    public function messages(): array{
        return [
            'new_password.required' => 'Yangi parolni kiriting.',
            'new_password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'confirm_password.required' => 'Parolni tasdiqlash majburiy.',
            'confirm_password.same' => 'Parollar mos kelmadi.',
        ];
    }
}
