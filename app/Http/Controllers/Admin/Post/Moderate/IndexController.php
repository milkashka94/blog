<?php

namespace App\Http\Controllers\Admin\Post\Moderate;

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
        //Контроллер выводит в админке список постов ожидающих модерации
        $posts = Post::where('is_published', '=', '0')->orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.posts.moderate.index', compact('posts'));
    }
}
