<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateStudentRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'role' => 'required|string',
            'password' => 'required|string',
            'name' => 'required|string',
            'date_birth' => 'required|date',
            'phone_student' => 'required|string|unique:students',
            'address_student' => 'required|string',
            'degree_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'group_id' => 'required|integer',
            'date_init' => 'required|date',
            'date_end' => 'required|date'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ]
            ));
    }
}
