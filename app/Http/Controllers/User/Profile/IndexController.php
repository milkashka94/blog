<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Контроллер вывода главной страницы профиля пользователя на сайте
        $user = User::where('name', '=' , $request->name)->firstorfail(); //найдем юзера по имени
        $posts = Post::where('author', '=', $user->id)->where('is_published','=','1')->paginate(6); //найдем его посты
        return view('User.pages.profile.show', compact('user', 'posts'));
    }
}
