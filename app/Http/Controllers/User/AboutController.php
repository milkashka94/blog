<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //вывод страницы "о нас" на сайте
        return view('User.pages.about');
    }
}
