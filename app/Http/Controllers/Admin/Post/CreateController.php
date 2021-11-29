<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер вывода в админке формы создания поста
        $categories = Category::all();  //запрос списка категорий
        $tags = Tag::pluck('title', 'id')->all();   //запрос списка тегов
        return view('Admin.pages.posts.create', compact('categories', 'tags'));
    }
}
