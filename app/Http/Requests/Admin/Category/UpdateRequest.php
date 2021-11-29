<?php

namespace App\Http\Requests\Admin\Category;

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
            'title' => 'required|string|min:3|max:50|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Это поле обязательно для заполнения',
            'title.min'=>'Поле должно состоять минимум из 3 символов',
            'title.max'=>'Максимальная длинна поля 50 символов',
            'title.unique' =>'Такая категория уже существует'
        ];
    }
}
