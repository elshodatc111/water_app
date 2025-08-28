<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmploesRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'id'     => ['required', 'exists:users,id'],
            'name'   => ['required', 'string', 'max:70'],
            'phone'  => ['required', 'string', 'max:16'],
            'type'   => ['required', 'in:direktor,meneger,courier'],
            'status' => ['required', 'in:true,false'],
        ];
    }

    public function messages(): array{
        return [
            'id.required'     => 'Foydalanuvchi ID topilmadi.',
            'id.exists'       => 'Bunday foydalanuvchi mavjud emas.',
            'name.required'   => 'F.I.O kiritilishi majburiy.',
            'name.max'        => 'F.I.O 70 belgidan oshmasligi kerak.',
            'phone.required'  => 'Telefon raqam kiritilishi shart.',
            'phone.max'       => 'Telefon raqam 16 belgidan oshmasligi kerak.',
            'type.required'   => 'Lavozim tanlanishi kerak.',
            'type.in'         => 'Lavozim noto‘g‘ri qiymatga ega.',
            'status.required' => 'Holat tanlanishi shart.',
            'status.in'       => 'Holat noto‘g‘ri qiymatga ega.',
        ];
    }
}
