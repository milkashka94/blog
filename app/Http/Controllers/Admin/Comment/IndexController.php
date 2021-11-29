<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводит в админке список комментариев (по 10 шт. на странцу)
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.comments.index', compact('comments'));
    }
}
