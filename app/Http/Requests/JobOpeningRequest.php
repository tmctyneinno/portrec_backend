<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobOpeningRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            // 'recruiter_id' => 'required|integer|exists:recruiters,id',
            'company_id' => 'required|integer|exists:companies,id',
            'job_level_id' => 'required',
            'job_function_id' => 'nullable|integer|exists:job_functions,id',
            'industry_id' => 'required|integer|exists:industries,id',
            'job_type_id' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'required_skills' => 'required|string',
            'min_salary' => 'nullable|string',
            'job_url' => 'nullable|string',
            'job_email' => 'nullable|string',
            'max_salary' => 'nullable|string',
            'deadline' => 'nullable',
            'qualifications' => 'nullable|string|max:255',
            'experience' => 'required|string',
            'other_qualifications' => 'nullable|string',
            'benefits' => 'nullable',
            'location' => 'required',
            // 'status' => 'required|string|max:255',
            'responsibilities' => 'required|string',
            'capacity' => 'required|string|max:255',
            'currency_id' => 'nullable|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $deadline = Carbon::parse($this->request->get('deadline'));
        $this->merge([
            'deadline' => $deadline->format('Y-m-d H:i:s'),
        ]);
    }
}
