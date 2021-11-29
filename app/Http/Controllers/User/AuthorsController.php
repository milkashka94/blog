<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class AuthorsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //вывод страницы авторов на сайте
        $users = User::withCount('posts')->orderby('posts_count', 'desc')->paginate(6); //запрашиваем список авторов
        return view('User.pages.authors', compact('users'));
    }
}
