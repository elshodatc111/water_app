<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDrektorEmployeeRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'name'  => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:users,phone'], 
            'type'  => ['required', 'in:direktor,manager,currer'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        ];
    }
    public function messages(): array{
        return [
            'name.required'  => 'F.I.O kiritilishi shart.',
            'phone.required' => 'Telefon raqam kiritilishi shart.',
            'phone.unique'   => 'Bu telefon raqam allaqachon mavjud.',
            'type.required'  => 'Lavozim tanlanishi shart.',
            'type.in'        => 'Lavozim faqat Direktor, Manager yoki Courier bo‘lishi mumkin.',
            'email.required' => 'Email kiritilishi shart.',
            'email.email'    => 'Email formati noto‘g‘ri.',
            'email.unique'   => 'Bu email allaqachon mavjud.',
        ];
    }
}
