<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class TeamController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Вывод списка пользователей на странице команды
        $users = User::where('role_id', '<', '3')->paginate(6); //запрашиваются редакторы и админы
        return view('User.pages.team', compact('users'));
    }
}
