<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher_id' => 'required'
        ];
    }
}
