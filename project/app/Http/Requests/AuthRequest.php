<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
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
            'login' => 'required|alpha_dash',
            'password' => 'required|alpha_dash|min:5',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Поле логин является обязательным.',
            'login.alpha_dash' => 'Поле логин может содержать буквенно-цифровые символы, а также дефисы и символы подчеркивания.',
            'password.alpha_dash' => 'Поле пароль может содержать буквенно-цифровые символы, а также дефисы и символы подчеркивания.',
            'password.required' => 'Поле пароль является обязательным.',
            'password.min' => 'Поле пароль должно содержать не менее 5 символов.',
            'email.required' => 'Поле email является обязательным.'
        ];
    }
}
