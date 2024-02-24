<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => ['required','unique:users,email','email'],
            'password' => ['required','min:8'],
            'rut' => ['required','cl_rut','unique:users,rut']
        ];
    }
}
