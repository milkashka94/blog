<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        //Контроллер отвечающий за обновление тега через админку
        $data = $request->validated();  //провалидируем данные
        $tag->update($data);    //обновляем
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }
}
