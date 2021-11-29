<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        //Контроллер обновляет данные коммента через админку
        $data = $request->validated();  //Проверяем пришедшие данные
        $comment->update($data);    //Обновляем
        return redirect()->route('comments.index')->with('success', 'Комментарий изменен');
    }
}
