<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ChangeLocale;
use SEO;

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
        //SEO::setTitle(config('seotools.meta.defaults.title'));
        //SEO::setDescription('This is my page description');
        SEO::opengraph()->setUrl('https://gngdev.com');
        SEO::setCanonical('https://gngdev.com');
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@LuizVinicius73');

        return view('welcome');
    }
}
