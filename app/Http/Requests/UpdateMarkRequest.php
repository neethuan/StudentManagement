<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarkRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array
    {
        return [
            'science' => 'required|numeric|min:0|max:100',
            'history' => 'required|numeric|min:0|max:100',
            'maths' => 'required|numeric|min:0|max:100',
        ];
    }
}
