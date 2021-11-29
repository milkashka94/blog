<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер главной страницы
        $posts = Post::Where('is_published','=','1')->orderBy('id', 'desc')->paginate(8);   //Запросим посты
        if (Post::count() > 2 ) {
            //Если постов более двух то вывести 2 рандомных поста (2 больших плашки на главной)
            $randomPosts = Post::Where('is_published','=','1')->get()->random(2);
        } else {
            //Если постов менее двух, выводим те что есть
            $randomPosts = Post::Where('is_published','=','1')->get();
        }
        return view('User.pages.index', compact('posts', 'randomPosts'));
    }
}
