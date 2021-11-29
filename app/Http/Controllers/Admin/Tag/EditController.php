<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tag $tag)
    {
        //Контроллер выводящий форму редактирования тега в админке
        return view('Admin.pages.tags.edit', compact('tag'));
    }
}
