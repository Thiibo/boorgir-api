<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedLocales = explode(',', env('SUPPORTED_LOCALES'));
        $localeRequested = $request->input('lang', 'en');
        $locale = in_array($localeRequested, $allowedLocales) ? $localeRequested : 'en';

        app()->setlocale($locale);

        return $next($request);
    }
}
