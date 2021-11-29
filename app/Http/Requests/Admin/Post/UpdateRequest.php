<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string|min:10|max:200',
            'description' => 'required|string|min:20|max:500',
            'content' => 'required|string|min:20',
            'category_id'=>'required|exists:categories,id',
            'image'=>'nullable|image',
            'deleteimg' => 'nullable',
            'is_published' => 'required',
            'tags' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.min' => 'Минимальная длинна поля 10 символов',
            'title.max' => 'Превышение максимальной длинны поля',
            'description.required' => 'Это поле обязательно для заполнения',
            'description.min' => 'Минимальная длинна поля 20 символов',
            'description.max' => 'Превышение максимальной длинны поля',
            'content.min' => 'Минимальная длинна поля 20 символов',
            'content.max' => 'Превышение максимальной длинны поля',
            'content.required' => 'Это поле обязательно для заполнения',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.exists' => 'Такой категории не существует',
            'image.image' => 'Файл не является изображением'
        ];
    }
}
