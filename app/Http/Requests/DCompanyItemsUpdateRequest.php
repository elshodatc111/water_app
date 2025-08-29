<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyItemsUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return true; // kerak bo'lsa auth tekshirishingiz mumkin
    }

    public function rules(): array{
        return [
            'id'    => 'required|integer|exists:companies,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:512|dimensions:width=512,height=512',
        ];
    }

    public function messages(): array{
        return [
            'id.required'         => 'ID topilmadi!',
            'id.exists'           => 'Bunday kompaniya mavjud emas!',
            'image.required'      => 'Rasm tanlanishi shart!',
            'image.image'         => 'Faqat rasm fayllarini yuklashingiz mumkin!',
            'image.mimes'         => 'Faqat .jpg yoki .png formatga ruxsat beriladi!',
            'image.max'           => 'Rasm hajmi 512KB dan oshmasligi kerak!',
            'image.dimensions'    => 'Rasm o‘lchami aniq 512x512px bo‘lishi shart!',
        ];
    }
}
