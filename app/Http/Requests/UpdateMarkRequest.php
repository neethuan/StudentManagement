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
            'science' => 'required|numeric',
            'history' => 'required|numeric',
            'maths' => 'required|numeric',
        ];
    }
}
