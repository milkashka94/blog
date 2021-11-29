<?php

namespace App\Http\Requests\Admin\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'text' => 'required|min:3|max:250'
        ];
    }

    public function messages()
    {
        return [
            'text.required'=>'Это поле обязательно для заполнения',
            'text.min'=>'Поле должно состоять минимум из 3 символов',
            'text.max'=>'Максимальная длинна поля 250 символов'
        ];
    }
}
