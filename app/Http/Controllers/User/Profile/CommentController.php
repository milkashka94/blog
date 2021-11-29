<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Контроллер вывода списка комментариев пользователя в профиле
        $user = User::where('name', '=' , $request->name)->firstorfail();       //ищем пользователя
        $comments = Comment::where('user_id', '=', $user->id)->paginate(6);     //ищем его комментарии
        return view('user.pages.profile.comments', compact('user', 'comments'));
    }
}
