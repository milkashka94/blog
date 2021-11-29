<?php

namespace App\Http\Controllers\User\Post;

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
        //Контроллер удаления поста через сайт
        $post->delete();
        return redirect()->route('main')->with('success', 'Пост удалён');
    }
}
