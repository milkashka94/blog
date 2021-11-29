<?php

namespace App\Http\Controllers\User\Offer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер вывода формы предложения новости на сайте
        $categories = Category::all();  //получение списка категорий
        $tags = Tag::pluck('title', 'id')->all();   //получение списка тегов
        return view('User.pages.offer', compact('categories', 'tags'));
    }
}
