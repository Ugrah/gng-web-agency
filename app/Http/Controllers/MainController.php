<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ChangeLocale;
use SEO;

/*
 * For test
*/
use Mail;

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
        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        SEO::opengraph()->setUrl('https://gngdev.com');
        SEO::setCanonical('https://gngdev.com');
        //SEO::opengraph()->addProperty('type', 'articles');

        return view('welcome');
    }

    public function test()
    {
        Mail::send('emails.test', [], function ($m) {
            $m->from('infos@gngdev.com', 'GnG App');

            $m->to('grulog23@gmail.com', 'Ulrich Grah')->subject('Your Reminder!');
        });

        return view('test');
    }
}
