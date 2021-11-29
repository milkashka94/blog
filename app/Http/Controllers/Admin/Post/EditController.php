<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        //Контроллер вывода в админке формы редактирования поста
        $categories = Category::all();  //запрашиваем список категорий
        $tags = Tag::pluck('title', 'id')->all();   //запришиваем список тегов
        return view('Admin.pages.posts.edit', compact('post', 'categories', 'tags'));
    }
}
