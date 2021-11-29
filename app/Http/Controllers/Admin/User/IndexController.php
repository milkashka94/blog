<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводящий в админке список пользователей (10 на страницу)
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.users.index', compact('users'));
    }
}
