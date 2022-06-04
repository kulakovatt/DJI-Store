<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name_product' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'count' => 'required',

//            'member_delete' => 'required'
        ];
    }
}

//TODO: прописать правила для заполнения полей и ошибки
