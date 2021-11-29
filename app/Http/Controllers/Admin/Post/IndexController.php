<?php

namespace App\Http\Controllers\Admin\Post;

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
        //Вывод в админке список постов (прошедших модерацию) (по 10 на странице)
        $posts = Post::where('is_published', '=', '1')->orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.posts.index', compact('posts'));
    }
}
