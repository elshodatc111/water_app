<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20|regex:/^[0-9+\-\s()]+$/',
            'order_price' => 'required|numeric|min:0',
            'price'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:512', // 512 KB
            'description' => 'required|string|min:10',
        ];
    }
    public function messages(): array{
        return [
            'name.required'        => 'Kompaniya nomi kiritilishi shart.',
            'phone.required'       => 'Telefon raqam kiritilishi shart.',
            'phone.regex'          => 'Telefon raqam noto‘g‘ri formatda.',
            'order_price.required' => 'Mahsulot narxi kiritilishi shart.',
            'order_price.numeric'  => 'Mahsulot narxi son bo‘lishi kerak.',
            'price.required'       => 'Buyurtma narxi kiritilishi shart.',
            'price.numeric'        => 'Buyurtma narxi son bo‘lishi kerak.',
            'image.required'       => 'Mahsulot rasmi tanlanishi shart.',
            'image.image'          => 'Fayl rasm bo‘lishi kerak.',
            'image.mimes'          => 'Rasm faqat jpeg, png, jpg, gif yoki webp formatida bo‘lishi kerak.',
            'image.max'            => 'Rasm hajmi 512KB dan oshmasligi kerak.',
            'description.required' => 'Mahsulot haqida ma’lumot kiritilishi shart.',
            'description.min'      => 'Mahsulot haqida kamida 10 ta belgi yozing.',
        ];
    }
}
