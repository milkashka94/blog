<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category)
    {
        //Контроллер удаляет категорию в админке.
        if ($category->posts->count()) {
            //Если в категории есть посты, то удаление категории запрещено
            return redirect()->route('categories.index')->with('error', 'Запрещено удалять категорию, в которой есть посты!');
        }
        //Песли постов нету, удаляем категорию
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
