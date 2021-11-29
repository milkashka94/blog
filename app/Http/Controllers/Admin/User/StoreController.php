<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        //Контроллер добавляющий пользователя через админку
       $data = $request->validated();   //проверяем данные
       $data['password'] = Hash::make($data['password']);   //создаем hash пароля
       User::firstOrCreate(['email' => $data['email']], $data); //заносим данные в бд
       return redirect()->route('users.index')->with('success', 'Пользователь создан');
    }
}
