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
        $prices = config('pricing.'.app()->getLocale().'.home');

        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        //SEO::opengraph()->setUrl($request->fullUrl());
        //SEO::setCanonical($request->fullUrl());
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::opengraph()->addProperty('locale', app()->getLocale());

        return view('statics.index', compact('prices'));
    }

    public function about()
    {
        return view('statics.about');
    }

    public function getContact()
    {
        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        //SEO::opengraph()->setUrl($request->fullUrl());
        //SEO::setCanonical($request->fullUrl());
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::opengraph()->addProperty('locale', app()->getLocale());

        return view('statics.contact');
    }

    public function postContact(ContactRequest $request)
    {
        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        //SEO::opengraph()->setUrl($request->fullUrl());
        //SEO::setCanonical($request->fullUrl());
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::opengraph()->addProperty('locale', app()->getLocale());


        Mail::send('emails.email_contact', $request->all(), function ($m) use ($request) {
            $m->from('contact@gngdev.com', 'GnG Dev');

            $m->to( 'infos@gngdev.com', 'GnG Dev')->subject($request->input('subject'));
        });

        Mail::send( 'emails.email_contact', $request->all(), function ($m) use ($request) {
            $m->from('contact@gngdev.com', 'GnG Dev');

            $m->to($request->input('email'), $request->input('nom'))->subject($request->input('subject'));
        });

        return view('statics.contact')->withOk( 'Merci. Votre message a été transmis à l\'administrateur du site. Vous recevrez une réponse rapidement.');
    }

    public function test()
    {
        /*
        Mail::send('emails.test', [], function ($m) {
            $m->from('contact@gngdev.com', 'GnG Web Agency');

            $m->to('grulog23@gmail.com', 'Ulrich Grah')->subject('Test Template Email');
        });
        */

        //SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('emails.test');
    }
}
