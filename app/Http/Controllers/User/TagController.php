<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tag $tag)
    {
        //Контроллер тегов
        if ($tag->id == null) {
            //Если не пришёл ид тега, значит нужно вывести список всех тегов
            $tags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->get();
            return view('User.pages.tags', compact('tags'));
        } else {
            //Если получили ид тега, выводим посты конкретнго тега
            $posts = $tag->posts()->where('is_published', '=', '1')->orderBy('id', 'desc')->paginate(10);
            return view('User.pages.tag', compact('posts', 'tag'));
        }
    }
}
