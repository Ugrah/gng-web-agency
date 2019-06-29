<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Jobs\ChangeLocale;
use App\Repositories\EstimatedPriceRepository;
use SEO;
use Mail;
use App\Jobs\SendContactToUserEmail;
use App\Jobs\SendContactToAdminEmail;
use Validator;

class MainController extends Controller
{
    protected $estimatedPriceRepository;

    public function __construct(EstimatedPriceRepository $estimatedPriceRepository){
        $this->middleware('ajax', ['only' => ['testPost', 'pricesPost']]);
        $this->estimatedPriceRepository = $estimatedPriceRepository;
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
        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        //SEO::opengraph()->setUrl($request->fullUrl());
        //SEO::setCanonical($request->fullUrl());
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::opengraph()->addProperty('locale', app()->getLocale());
        return view('statics.index');
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
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        // Store estimation in db
        $estimatePrice = $this->estimatedPriceRepository->store($request->all());

        // Send email to User
        $this->sendMail('emails.estimateToUser', $request->all(), 'contact@gngdev.com', $request->input('email'), 'Estimation de prix : Application Mobile', config('infos.name'));

        // Send email to Admin
        $this->sendMail('emails.contactToAdmin', $request->all(), 'contact@gngdev.com', 'infos@gngdev.com', 'Estimation de prix : Application Mobile', config('infos.name').' - Un utilisateur a estimé le prix de son appllication mobile');
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
        SendContactToUserEmail::dispatchNow($request->all());
        SendContactToAdminEmail::dispatchNow($request->all());

        //SEO::setTitle('Home Page');
        //SEO::setDescription('This is my page description');
        //SEO::opengraph()->setUrl($request->fullUrl());
        //SEO::setCanonical($request->fullUrl());
        //SEO::opengraph()->addProperty('type', 'articles');
        SEO::opengraph()->addProperty('locale', app()->getLocale());

        return view('statics.contact')->withOk( 'Merci. Votre message a été transmis à l\'administrateur du site. Vous recevrez une réponse rapidement.');
    }

    public function privacyPolicy()
    {
        return view('statics.privacyPolicy');
    }

    private function sendMail($view, $variables = [], $from, $to, $subject, $mailTitle)
    {
        Mail::send($view, $variables, function ($m) use ($from, $to, $subject, $mailTitle) {
            $m->from($from, config('infos.name'));

            $m->to($to, $mailTitle)->subject($subject);
        });
    }

    public function test()
    {
       
        /* Traitement to etimate to Admin 
        $amount = 3000;
        $estimateCode = 'XXX-CODE';
        $numberSeparator = app()->getLocale() == 'fr' ? ' ' : ',';
        $decimalSeparator = app()->getLocale() == 'fr' ? ',' : '.';
        return view('emails.estimateToAdmin', compact('amount', 'estimateCode', 'numberSeparator', 'decimalSeparator'));
        */


        // Traitement to contact to User and contact to Admin
        $name = 'Ulrich Grah';
        $email = 'grulog@live.com';
        $phoneNumber = '+212645717187';
        $subject = 'Subject of the message';
        $content ='Lorem ipsum doalutd kgilus lgiaskjh klsiuly jhgs uyammpoqoj sjhuysvx iusigss.';

        
        // return view('emails.contactToUser', compact('name', 'email', 'phoneNumber', 'subject', 'content'));
        // return view('emails.contactToAdmin', compact('name', 'email', 'phoneNumber', 'subject', 'content'));

        $arrayTest = ['attr_a' => 'value', 'attr_2' => 'value'];
        $arr_ip = geoip(request()->ip());
        return view('test', compact('arr_ip', 'arrayTest'));
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
            'name' => 'string|required|max:255',
            'email' => 'email|required|max:255|unique:users',
            'qualityOption' => 'string|required',
            'typeOption' => 'string|required',
            'designOption' => 'string|required',
            'profitableOption' => 'string|required',
            'loginOption' => 'string|required',
            'userSpaceOption' => 'string|required',
            'websiteIntagrationOption' => 'string|required',
            'adminSpaceOption' => 'string|required',
            'languageOption' => 'string|required',
            'advancedFeaturesOption' => 'string|required',
            'statusProjectOption' => 'string|required',
        ]);
    }

    public function testPost(Request $request)
    {
        $validator = $this->validatorPriceForm($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $estimatePrice = $this->estimatedPriceRepository->store($request->all());
        return response()->json();
    }
}
