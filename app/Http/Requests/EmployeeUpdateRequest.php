<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can customize this if authorization logic is needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee'); // Get the employee ID from the route

        return [
            // 'name' => 'required|string|max:255|unique:users,name,' . $this->route('employee'),
            // 'email' => 'required|email|unique:users,email,' . $this->route('employee'),
            // 'phone' => 'nullable|regex:/^[0-9]{10,15}$/|unique:users,phone,' . $this->route('employee'),

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'name')->ignore($employeeId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($employeeId),
            ],
            'department_id' => 'required|exists:departments,id',
            'gender' => 'required|in:male,female,other',
            'phone' => [
                'nullable',
                'regex:/^[0-9]{10,15}$/',
                Rule::unique('users', 'phone')->ignore($employeeId),
            ],
            'address' => 'nullable|string|max:500',
            'birthday' => 'nullable|date|before:today',
            'is_present' => 'required|boolean',
        ];
    }


    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already in use.',
            'department_id.required' => 'Please select a department.',
            'department_id.exists' => 'The selected department does not exist.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selected.',
            'phone.regex' => 'The phone number must contain 10-15 digits.',
            'birthday.date' => 'The birthday must be a valid date.',
            'birthday.before' => 'The birthday must be a date before today.',
            'is_present.required' => 'Please specify if the employee is present.',
            'is_present.boolean' => 'The "Is Present" field must be true or false.',
        ];
    }
}
