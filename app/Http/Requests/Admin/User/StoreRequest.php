<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|email|string|unique:users',
            'role'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.string'=>'Имя должно быть строкой',
            'name.required'=>'Это поле необходимо для заполнения',
            'email.required'=>'Это поле необходимо для заполнения',
            'email.unique'=>'Пользователь с таким email уже существует',
        ];
    }
}
