<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DCompanyUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return true; // kerak bo'lsa auth tekshirishingiz mumkin
    }

    public function rules(): array{
        return [
            'id'          => 'required|integer|exists:companies,id',
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'order_price' => 'required|numeric|min:1',
            'status'      => 'required|in:true,false',
            'description' => 'required|string|max:1000',
        ];
    }

    public function messages(): array{
        return [
            'id.required'          => 'ID mavjud emas!',
            'id.exists'            => 'Bunday ID topilmadi!',
            'name.required'        => 'Firma nomi kiritilishi shart!',
            'phone.required'       => 'Telefon raqam kiritilishi shart!',
            'order_price.required' => 'Maxsulot narxi kiritilishi shart!',
            'status.required'      => 'Ish faoliyatini tanlang!',
            'description.required' => 'Maxsulot haqida maʼlumot yozing!',
        ];
    }
}
