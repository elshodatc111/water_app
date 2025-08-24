<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyItemRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'name'       => ['required', 'string', 'max:255'],
            'price'      => ['required', 'numeric', 'min:0'],
            'image'      => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // 2MB = 2048 KB
        ];
    }

    public function messages(): array{
        return [
            'company_id.required' => 'Kompaniya ID majburiy.',
            'company_id.exists'   => 'Kompaniya topilmadi.',
            'name.required'       => 'Mahsulot nomi majburiy.',
            'price.required'      => 'Narx majburiy.',
            'price.numeric'       => 'Narx faqat raqam bo‘lishi kerak.',
            'image.required'      => 'Rasm tanlang.',
            'image.image'         => 'Yuklangan fayl rasm bo‘lishi kerak.',
            'image.mimes'         => 'Faqat JPG, JPEG yoki PNG rasm formatlari qabul qilinadi.',
            'image.max'           => 'Rasm hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}
