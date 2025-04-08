<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationForm extends FormRequest
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
            'position_applied' => 'required',
            'email' => 'required|email|unique:application_details',
            'mobile_no' => 'required|min:10|max:10',
            'experience' => 'required',
            'designation' => 'required',
            'current_ctc' => 'required',
            'expected_ctc' => 'required',
            'notice_period' => 'required',
            'resume' => 'required|mimes:pdf,jpeg|file',
            'cover_letter' => 'required'
        ];
    }
}
