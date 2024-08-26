<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    public function handle($request, Closure $next)
    {   
        dd('Middleware SetLanguage Executed'); // Acest mesaj ar trebui să apară la încărcarea unei pagini


        $locale = Session::get('locale', config('app.locale'));

        // Loguri pentru a verifica starea curentă a locale-ului
        \Log::info('Locale from session: ' . $locale);
        \Log::info('App locale before setting: ' . App::getLocale());

        // Setarea locale-ului
        App::setLocale($locale);

        // Log pentru a verifica locale-ul după setare
        \Log::info('App locale after setting: ' . App::getLocale());

        return $next($request);
    }
}
