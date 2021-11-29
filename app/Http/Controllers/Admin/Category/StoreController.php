<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

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
        //Контроллер добавляет категорию в БД через админку
        $data = $request->validated();  //провалидируем пришедшие данные
        Category::firstOrCreate($data); //заносим в БД
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }
}
