<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyImageRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'id' => 'required|exists:companies,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
        ];
    }
    public function messages(): array{
        return [
            'id.required' => 'Company ID majburiy.',
            'id.exists' => 'Bunday kompaniya topilmadi.',
            'image.required' => 'Rasm yuklash majburiy.',
            'image.image' => 'Faqat rasm fayl yuklashingiz mumkin.',
            'image.mimes' => 'Faqat jpeg, png, jpg yoki webp formatlariga ruxsat beriladi.',
            'image.max' => 'Rasm hajmi 512KB dan katta bo‘lmasligi kerak.',
            'image.dimensions' => 'Rasm hajmi aniq 512x512 px bo‘lishi shart.',
        ];
    }
}
