<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Feedback $message
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Feedback $message)
    {
        //Контроллер просмотра сообщения пришедшего через форму обратной связи
        return view('Admin.pages.feedback.show', compact('message'));
    }
}
