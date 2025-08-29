<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfileRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check();
    }
    public function rules(): array{
        return [
            'name'  => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ];
    }
    public function messages(): array{
        return [
            'name.required' => 'Ism Familiya kiritilishi shart.',
            'name.string'   => 'Ism Familiya matn bo‘lishi kerak.',
            'name.max'      => 'Ism Familiya 255 ta belgidan oshmasligi kerak.',
            'phone.string'  => 'Telefon raqam noto‘g‘ri formatda.',
            'phone.max'     => 'Telefon raqam 20 ta belgidan oshmasligi kerak.',
        ];
    }
}
