<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobDetails extends FormRequest
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
            'job_name' => 'required',
            'job_des' => 'required',
            'job_requirements' => 'required',
            'exp_from_cand' => 'required',
            'skills' => 'required',
            'qualification' => 'required',
            'vacancy' => 'required'
        ];
    }
}
