<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        //Контроллер удаления поста в админке
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост удалён');
    }
}
