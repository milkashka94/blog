<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        //Контроллер обновления данных пользователя через сайт
        $data = $request->validated();  //провалидируем данные
        if ($request->hasFile('avatar')) {
            //если пришел аватар, загрузим его
            $data['avatar'] = Storage::disk('public')->put('/avatars', $data['avatar']);
        }
        $user->update($data);   //обновляем данные
        return redirect()->route('profile.index', $data['name']);
    }
}
