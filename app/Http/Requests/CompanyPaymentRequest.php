<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyPaymentRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    public function rules(): array{
        return [
            'company_id'   => ['required', 'exists:companies,id'],
            'amount'       => ['required', 'numeric', 'min:1000'],
            'paymart_type' => ['required', 'in:naqt,plastik'],
            'description'  => ['required', 'string', 'max:500'],
        ];
    }
    public function messages(): array{
        return [
            'company_id.required'   => "Kompaniya ID majburiy.",
            'company_id.exists'     => "Bunday kompaniya mavjud emas.",
            'amount.required'       => "To'lov summasi majburiy.",
            'amount.numeric'        => "To'lov summasi faqat son bo‘lishi kerak.",
            'amount.min'            => "To'lov summasi 1000 so‘mdan katta bo‘lishi kerak.",
            'paymart_type.required' => "To'lov turi tanlanishi kerak.",
            'paymart_type.in'       => "To'lov turi noto‘g‘ri.",
            'description.required'  => "Izoh yozish majburiy.",
            'description.max'       => "Izoh 500 belgidan oshmasligi kerak.",
        ];
    }
}
