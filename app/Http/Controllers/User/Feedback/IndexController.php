<?php

namespace App\Http\Controllers\User\Feedback;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Контроллер вывода на сайте формы обратной связи
        return view('User.pages.feedback');
    }
}
