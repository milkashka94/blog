<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {
        //Контроллер обновляет данные в БД через админку
        $data = $request->validated();  //провалидируем пришедшие данные
        $category->update($data);   //обновляем данные в БД
        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }
}
