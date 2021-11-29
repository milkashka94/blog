<?php

namespace App\Http\Controllers\Admin\Post\Moderate;

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
        //Контроллер для отклонения постов не прошедших модерацию в админке
        $post->delete();
        return redirect()->route('moderation.index')->with('success', 'Предложенный пост отклонён');
    }
}
