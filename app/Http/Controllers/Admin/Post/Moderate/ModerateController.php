<?php

namespace App\Http\Controllers\Admin\Post\Moderate;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ModerateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        //Контроллер просмотра поста в админке ожидающего модерацию
        $categories = Category::all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('Admin.pages.posts.moderate.moderate', compact('post', 'categories', 'tags'));
    }
}
