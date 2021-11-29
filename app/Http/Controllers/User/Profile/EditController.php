<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Контроллер вывода формы редактролвания пользователя на сайте
        $user = User::where('name', '=' , $request->name)->firstorfail(); //найдем юзера по имени
        return view('User.pages.profile.edit', compact('user'));
    }
}
