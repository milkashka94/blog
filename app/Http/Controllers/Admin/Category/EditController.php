<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category)
    {
        //Контроллер выводит форму редактирования категории в админке
        return view('Admin.pages.categories.edit', compact('category'));
    }
}
