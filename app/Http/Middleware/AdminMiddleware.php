<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Middleware для защиты админки.
        if (Auth::check() && Auth::user()->role->id == 1) {
            //Пропускаем только авторизированных юзеров с ролью админ
            return $next($request);
        } else {
            //Если не админ, то возвращаем 404 ошибку
            abort(404);
        }
    }
}
