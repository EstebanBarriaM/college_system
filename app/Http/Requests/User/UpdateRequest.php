<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => ['required','max:45'],
            'last_name' => ['required','max:45'],
            'email' => ['required','email', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['nullable','min:8'],
            'rut' => ['required','cl_rut', Rule::unique('users', 'rut')->ignore($this->user)]
        ];
    }
}
