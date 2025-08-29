<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminPasswordProfileRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check();
    }
    public function rules(): array{
        return [
            'current_password'      => ['required', 'string', 'min:8'],
            'new_password'          => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages(): array{
        return [
            'current_password.required' => 'Hozirgi parolni kiriting.',
            'new_password.required'     => 'Yangi parolni kiriting.',
            'new_password.min'          => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'new_password.confirmed'    => 'Yangi parol va tasdiqlash paroli mos emas.',
        ];
    }
}
