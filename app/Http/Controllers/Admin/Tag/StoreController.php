<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

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
        //Контроллер добавляющий в БД тег пришедший через админку
        $data = $request->validated(); //провалидируем пришедшие данные
        Tag::firstOrCreate($data);  // добавляем
        return redirect()->route('tags.index')->with('success', 'Тег создан');
    }
}
