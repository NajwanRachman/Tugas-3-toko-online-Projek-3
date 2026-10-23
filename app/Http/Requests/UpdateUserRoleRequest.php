<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRoleRequest extends FormRequest
{
    /**
     * Tentukan siapa yang boleh mengirim request.
     */
    public function authorize(): bool
    {
        return $this->user()?->role === 'admin';
    }

    /**
     * Validasi input dari form.
     */
    public function rules(): array
    {
        return [
            'role' => [
                'required',
                'string',
                Rule::in(['customer', 'staff']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'role.required' => 'Role wajib dipilih.',
            'role.string' => 'Role harus berupa teks.',
            'role.in' => 'Role hanya boleh customer atau staff.',
        ];
    }
}
