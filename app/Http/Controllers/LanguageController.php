<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request){
        if ($request->ajax()){
            $request->session()->put('locales', $request->locales);
            $request->session()->flash('alert-success', ('app.Locale_Change_Success'));
        }
    }
}
