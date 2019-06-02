<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ChangeLocale;

class MainController extends Controller
{
    public function __construct(){}

    /**
     * Change language.
     *
     * @param  String $lang 
     * @param  App\Jobs\ChangeLocale $changeLocale
     * @return Response
     */
    public function language($lang, ChangeLocale $changeLocale)
    {
        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');

        $changeLocale->lang = $lang;

        $this->dispatch($changeLocale);

        return redirect()->back();
    }

    public function index() 
    {
        
    }
}
