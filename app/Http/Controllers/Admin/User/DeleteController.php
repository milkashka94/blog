<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        //Контроллер удаления пользователя через админку
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь удалён');
    }
}
