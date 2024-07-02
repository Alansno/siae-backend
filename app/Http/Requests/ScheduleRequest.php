<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
        'date_class_init' => 'required|date',
        'date_class_end' => 'required|date',
        'timezone' => 'required'
        ];
    }
}
