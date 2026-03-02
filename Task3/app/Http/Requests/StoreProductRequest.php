<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Назва товару" не може бути порожньою.',
            'price.required' => 'Поле "Ціна" є обов\'язковим.',
            'price.numeric' => 'Ціна має бути числовим значенням.',
            'price.gt' => 'Ціна повинна бути більшою за нуль.',
        ];
    }
}
