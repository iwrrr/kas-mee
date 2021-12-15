<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                'min:2',
                Rule::unique(User::class)->ignore($this->id),
            ],
            'phone_number' => ['required', 'string', 'max:15'],
            'password' => ($this->password) ? $this->passwordRules() : [],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'email.unique' => 'Email telah digunakan.',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong.',
            'password.required' => 'Kata sandi tidak boleh kosong.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.'
        ];
    }
}
