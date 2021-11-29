<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
        //Middleware для защиты от юзеров (используется для защиты редактирования и удаления постов)
        if (Auth::check() && Auth::user()->role->id < 3) {
            //Если роль админ или редактор, то пропускаем
            return $next($request);
        } else {
            //Иначе: роль - юзер, возвращаем 404 ошибку
            abort(404);
        }
    }
}
