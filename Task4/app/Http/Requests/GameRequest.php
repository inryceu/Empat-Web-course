<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'publisher_id' => 'required|exists:publishers,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ];
    }
}
