<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'id'          => 'required|exists:companies,id',
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'order_price' => 'required|numeric|min:0',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ];
    }
    public function messages(): array{
        return [
            'name.required'        => 'Kompaniya nomini kiriting.',
            'phone.required'       => 'Telefon raqamini kiriting.',
            'order_price.required' => 'Mahsulot narxini kiriting.',
            'price.required'       => 'Buyurtma narxini kiriting.',
            'description.required' => 'Mahsulot haqida yozish majburiy.',
        ];
    }
}
