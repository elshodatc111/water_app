<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyItemCreateRequest extends FormRequest{
    public function authorize(): bool{
        return true; // Ruxsat berish (hozircha barcha uchun true)
    }

    public function rules(): array{
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Maxsulot nomi majburiy.',
            'price.required' => 'Maxsulot narxi majburiy.',
            'price.numeric' => 'Narx raqam bo‘lishi kerak.',
            'image.required' => 'Maxsulot rasmi majburiy.',
            'image.image' => 'Fayl rasm bo‘lishi kerak.',
            'image.mimes' => 'Faqat JPG yoki PNG formatiga ruxsat beriladi.',
            'image.max' => 'Rasm hajmi 1 MB dan oshmasligi kerak.',
        ];
    }
}
