<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Comment $comment)
    {
        //Контроллер удаляет комментарий через админку
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Комментарий удалён');
    }
}
