<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMarkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => [
            'required',
                Rule::unique('marks')
                ->where('term_id', $this->term_id)
            ],
            'term_id' => [
                'required',
                Rule::unique('marks')
                ->where('student_id', $this->student_id)
            ],
            'science' => 'required|numeric',
            'history' => 'required|numeric',
            'maths' => 'required|numeric',
            ];
    }
}
