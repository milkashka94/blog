<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Comment $comment)
    {
        //Контроллер выводит форму редактирования комментария в админке
        return view('Admin.pages.comments.edit', compact('comment'));
    }
}
