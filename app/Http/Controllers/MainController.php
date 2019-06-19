<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Jobs\ChangeLocale;
use SEO;
use Mail;
use Validator;

class MainController extends Controller
{
    public function __construct(){
        $this->middleware('ajax', ['only' => ['testPost', 'pricesPost']]);
    }

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
        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.about');
    }

    public function website()
    {
        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.website');
    }

    public function mobileApp()
    {
        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.mobileApp');
    }

    public function prices()
    {
        $prices = config('pricing.'.app()->getLocale().'.prices');

        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.prices', compact('prices'));
    }

    public function ajaxPrices(Request $request)
    {
        $validator = $this->validatorPriceForm($request->all());
        /*
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        */
        //Send email to admn and user 
        return response()->json();
    }

    public function realisations()
    {
        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.realisations');
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

            $m->to($request->input('email'), $request->input('name'))->subject($request->input('subject'));
        });

        return view('statics.contact')->withOk( 'Merci. Votre message a été transmis à l\'administrateur du site. Vous recevrez une réponse rapidement.');
    }

    public function privacyPolicy()
    {
        return view('statics.privacyPolicy');
    }

    public function test()
    {
        /*
        Mail::send('emails.test', [], function ($m) {
            $m->from('contact@gngdev.com', 'GnG Web Agency');

            $m->to('grulog23@gmail.com', 'Ulrich Grah')->subject('Test Template Email');
        });
        */
        $amount = 3000;
        $estimateCode = 'XXX-CODE';

        //SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('emails.estimateToAdmin', compact('amount', 'estimateCode'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorPriceForm(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function testPost(Request $request)
    {
        $validator = $this->validatorPriceForm($request->all());
        /*
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        */
        //$this->create($request->all());
        return response()->json();
    }
}
