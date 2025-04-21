<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'string', 'max:255', 'unique:users,employee_id,' . $this->user()->id], // Ensure unique employee_id
            'password' => ['nullable', 'confirmed', 'min:8'], // Password field is optional
        ];
    }
}

