<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводящий форму создания пользователя в админке
        $roles = Role::get();   //получим список ролей пользователя
        return view('Admin.pages.users.create', compact('roles'))->with('success', 'Пользователь создан');
    }
}
