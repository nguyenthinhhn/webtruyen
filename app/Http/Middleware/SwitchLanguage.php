<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SwitchLanguage
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
        $language = session('language');
        if ($language) {
            App::setLocale($language);
        } else {
            session([
                'language' => App::getLocale()
            ]);
        }

        return $next($request);
    }
}
