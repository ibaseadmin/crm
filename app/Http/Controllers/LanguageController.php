<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        if (in_array($locale, ['en', 'ro'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
            return redirect()->back();
        }
    }
}
