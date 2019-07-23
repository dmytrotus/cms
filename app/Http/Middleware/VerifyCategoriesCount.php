<?php

namespace App\Http\Middleware;

use Closure;

use App\Category; //Створюємо Milleware щоб заборонити робити щось. Зараз працюємо з категоріями

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Category::all()->count() === 0) {

            session()->flash('error', 'Спочатку створи категорії');

            return redirect()->back();
        }
        return $next($request);
    }
}
