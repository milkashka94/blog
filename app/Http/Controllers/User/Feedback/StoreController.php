<?php

namespace App\Http\Controllers\User\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Feedback\StoreRequest;
use App\Models\Feedback;

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
        //Контроллер добавления в бд сообщения из формы обратной связи
        $data = $request->validated();  //провалидируем данные
        Feedback::create($data);    //заносим в данные
        return redirect()->route('main')->with('success', 'Сообщение отправлено, ответ будет дан на указанный email');
    }
}
