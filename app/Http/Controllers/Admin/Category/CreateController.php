<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводит страницу создания категорий в админке
        return view('Admin.pages.categories.create');
    }
}
