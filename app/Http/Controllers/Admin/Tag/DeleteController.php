<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tag $tag)
    {
        //Контроллер отвечающий за удаление тега в админке
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег удалён');
    }
}
