<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyUpdateImageRequest extends FormRequest{
    public function authorize(): bool{
        return true; // kerak bo‘lsa, user ruxsatini tekshiring
    }

    public function rules(): array{
        return [
            'id'    => 'required|integer|exists:company_items,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1024|dimensions:width=1080,height=1080',
        ];
    }

    public function messages(): array{
        return [
            'image.required'    => 'Rasm yuklanishi shart.',
            'image.image'       => 'Fayl rasm bo‘lishi kerak.',
            'image.mimes'       => 'Faqat JPG yoki PNG formatdagi fayllarga ruxsat beriladi.',
            'image.max'         => 'Fayl hajmi 1 MB dan oshmasligi kerak.',
            'image.dimensions'  => 'Rasm o‘lchami aniq 1080x1080 bo‘lishi kerak.',
        ];
    }
}
