<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
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
        //Контроллер выводящий в админке список тегов (по 10 шт на страницу)
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.tags.index', compact('tags'));
    }
}
