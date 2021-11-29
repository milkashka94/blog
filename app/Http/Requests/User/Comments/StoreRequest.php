<?php

namespace App\Http\Requests\User\Comments;

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
            'text' => 'required|min:5|max:200'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Это поле обязательно для заполнения',
            'text.min' => 'Минимальная длинна поля 5 символов',
            'text.max' => 'Превышение максимальной длинны поля',
        ];
    }
}
