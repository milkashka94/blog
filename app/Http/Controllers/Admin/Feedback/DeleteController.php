<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Feedback $message
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Feedback $message)
    {
        //Контроллер удаляет сообщение пришедшее через обратную связь в админке
        $message->delete();
        return redirect()->route('feedback.index')->with('success', 'Сообщение удалено');

    }
}
