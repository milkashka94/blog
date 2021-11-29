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
            'name' => 'required|string|min:3|max:40|unique:users',
            'email' => 'required|string|email|unique:users',
            'role_id' => 'required|string|exists:roles,id',
            'description' => 'nullable|string|min:5|max:250',
            'password' => 'string|min:8|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.min' => 'Минимальная длинна поля 3 символа',
            'name.max' => 'Превышена максимальная длинна поля',
            'name.unique' =>'Такой логин уже используется',
            'email.unique' =>'Такой email уже используется',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Введеное значение не является email-ом',
            'role_id.required' => 'Это поле обязательно для заполнения',
            'role_id.exists' => 'Не верное значение, такой роли не существует',
            'description.min' => 'Минимальная длинна поля 5 символа',
            'description.max' => 'Превышена максимальная длинна поля',
            'password.min' => 'Минимальная длинна поля 8 символа',
            'password.max' => 'Превышена максимальная длинна поля'
        ];
    }
}
