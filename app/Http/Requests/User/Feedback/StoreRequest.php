<?php

namespace App\Http\Requests\User\Feedback;

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
            'email' => 'required',
            'title' => 'required|min:5|max:50',
            'text' => 'required|min:10|max:500'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.min' => 'Минимальная длинна поля 5 символов',
            'title.max' => 'Превышение максимальной длинны поля',
            'text.required' => 'Это поле обязательно для заполнения',
            'text.min' => 'Минимальная длинна поля 10 символов',
            'text.max' => 'Превышение максимальной длинны поля',
            'email.required' => 'Это поле обязательно для заполнения'
        ];
    }
}
