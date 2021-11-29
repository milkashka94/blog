<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Контроллер вывода списка поедложенных постов пользователя
        $user = User::where('name', '=' , $request->name)->firstorfail();   //ищем пользователя
        $posts = Post::where('author', '=', $user->id)->where('is_published','=','0')->paginate(6); //ищем посты
        return view('User.pages.profile.offers', compact('user', 'posts'));
    }
}
