<?php

namespace App\Http\Controllers\User\Post;

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
        //Контроллер редактирования поста через сайт
        $categories = Category::all();  //получаем список категорий
        $tags = Tag::pluck('title', 'id')->all();   //получаем список тегов
        return view('user.pages.post.edit', compact('post', 'categories', 'tags'));
    }
}
