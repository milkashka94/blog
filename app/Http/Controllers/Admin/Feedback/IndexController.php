<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер выводит в админке список сообщений, пришедших через форму обратной связи сайта
        $messages = Feedback::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.feedback.index', compact('messages'));
    }
}
