<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class VacancyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Вывод страницы вакансий на сайте
        return view('User.pages.vacancy');
    }
}
