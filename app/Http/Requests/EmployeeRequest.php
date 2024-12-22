<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EmployeeRequest extends FormRequest
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
            //
            'name' => [
                'required',
                'string',
                'min:5',
                Rule::unique('users', 'name')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'email' => 'required|email|unique:users,email,' . $this->user,
            // 'email_verified_at' => 'nullable|date',
            'password' => $this->isMethod('post') ? 'required|string|min:8' : 'nullable|string|min:8',
            'employee_id' => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'gender' => 'nullable|in:male,female,other',
            'phone' => [
                'nullable',
                'string',
                'unique:users,phone,' . $this->user,
                'regex:/^09\d{7,10}$/',
                'max:12'
            ],
            'address' => 'nullable|string|max:255',
            'nrc_number' => 'nullable|string|unique:users,nrc_number,' . $this->user,
            'birthday' => 'nullable|date',
            'date_of_join' => 'nullable|date',
            'is_present' => 'boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'deleted_by' => 'nullable|string',
        ];
    }
}
