<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'company_id' => ['required', 'integer'],
            'name'    => ['required', 'string', 'max:255'],
            'phone'   => ['required', 'string', 'regex:/^\+?[0-9\s\-\(\)]{9,20}$/'],
            'type'    => ['required', 'in:direktor,currer'],
            'email'   => ['required', 'email', 'max:255'],
        ];
    }

    public function messages(): array{
        return [
            'company_id.required' => 'Kompaniya aniqlanmadi.',
            'name.required'    => 'Hodim FIO majburiy.',
            'phone.required'   => 'Telefon raqami majburiy.',
            'phone.regex'      => 'Telefon raqami noto‘g‘ri formatda.',
            'type.required'    => 'Lavozimni tanlang.',
            'type.in'          => 'Lavozim noto‘g‘ri tanlangan.',
            'email.required'   => 'Email majburiy.',
            'email.email'      => 'Email formati noto‘g‘ri.',
        ];
    }
}
