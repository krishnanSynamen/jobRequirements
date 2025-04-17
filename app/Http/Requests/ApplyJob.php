<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJob extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:career_applications',
            'cover_letter' => 'required',
            'type' => 'required',
            'job_id' => 'required',
            'user_id' => 'required',
            'current_ctc' => 'required|numeric|regex:/^\d{1,2}(\.\d{1})?$/',
            'expected_ctc' => 'required|regex:/^\d{1,2}(\.\d{1})?$/',
            'notice_period' => 'required'
        ];
    }
}
