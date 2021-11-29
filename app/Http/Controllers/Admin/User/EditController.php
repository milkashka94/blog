<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        //Контроллер вывода формы редактирования пользователя в админке
        $roles = Role::all();   //получим список ролей пользователя
        return view('Admin.pages.users.edit', compact('user', 'roles'));
    }
}
