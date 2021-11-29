<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводит список категорий в админке (по 10 штук на странице)
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.categories.index', compact('categories'));
    }
}
