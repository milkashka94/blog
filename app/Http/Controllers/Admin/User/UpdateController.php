<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        //Контроллер для редактирования пользователя через админку
        $data = $request->validated();  //провалидируем данные
        if (isset($data['password'])) {
            //Если пришел пароль, то создадим hash нового пароля и обновим
            $data['password'] = Hash::make($data['password']);
        } else {
            //Если новый пароль не приходил, оставляем старый
            $data['password'] = $user->password;
        }
        $user->update($data);   //заносим данные в бд
        return redirect()->route('users.index')->with('success', 'Данные пользователя обновлены');
    }
}
