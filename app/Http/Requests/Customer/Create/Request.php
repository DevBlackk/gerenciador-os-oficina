<?php

declare(strict_types=1);

namespace App\Http\Requests\Customer\Create;

class Request extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|string|max:20',
            'cpf' => 'nullable|required|string|max:11|unique:customers,cpf',
        ];
    }

        public function messages(): array
        {
            return [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a string.',
                'name.min' => 'The name must be at least 3 characters.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'phone.required' => 'The phone field is required.',
                'phone.string' => 'The phone must be a string.',
                'phone.max' => 'The phone may not be greater than 20 characters.',
                'cpf.string' => 'The cpf must be a string.',
                'cpf.max' => 'The cpf may not be greater than 11 characters.',
                'cpf.unique' => 'The cpf has already been taken.',
            ];
        }
}
