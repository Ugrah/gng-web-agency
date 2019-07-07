<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Jobs\ChangeLocale;
use App\Repositories\EstimatedPriceRepository;
use SEO;
use App\Traits\SeoTrait;
use App\Jobs\SendContactToUserEmail;
use App\Jobs\SendContactToAdminEmail;
use App\Jobs\SendEstimationEmailToUser;
use App\Jobs\SendEstimationEmailToAdmin;
use Validator;


class MainController extends Controller
{
    use SeoTrait;

    const TRANS_PATH = 'back/controllers/mainController.';
    const SEO_TITLE_PATH = 'back/seo/pageTitle.';

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
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'home').' - '.trans('back/seo/defaults.default_title'));
        return view('statics.index');
    }

    public function about()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'about').' - '.trans('back/seo/defaults.default_title'));
        return view('statics.about');
    }

    public function website()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'website').' - '.trans('back/seo/defaults.default_title'));
        return view('statics.website');
    }

    public function mobileApp()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'mobile_app').' - '.trans('back/seo/defaults.default_title'));
        return view('statics.mobileApp');
    }

    public function prices()
    {
        $prices = config('pricing.'.app()->getLocale().'.prices');
        $numberSeparator = (app()->getLocale() == 'fr') ? ' ' : ',';

        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'prices').' - '.trans('back/seo/defaults.default_title'));
        $this->addKeywords(config('seoapp.'.app()->getLocale().'.keywords.prices'));
        return view('statics.prices', compact('prices', 'numberSeparator'));
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
        $request->merge(['ipAdress' => request()->ip()]);
        $estimatePrice = $this->estimatedPriceRepository->store($request->all());

        SendEstimationEmailToUser::dispatchNow($estimatePrice);
        SendEstimationEmailToAdmin::dispatchNow($estimatePrice);

        return response()->json();
    }

    public function realisations()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'realisations').' - '.trans('back/seo/defaults.default_title'));
        return view('statics.realisations');
    }

    public function getContact()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'contact').' - '.trans('back/seo/defaults.default_title'));        
        return view('statics.contact');
    }

    public function postContact(ContactRequest $request)
    {
        SendContactToUserEmail::dispatchNow($request->all());
        SendContactToAdminEmail::dispatchNow($request->all());

        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'contact').' - '.trans('back/seo/defaults.default_title'));        
        return view('statics.contact')->withOk(trans(self::TRANS_PATH.'notif.post_contact'));
    }

    public function privacyPolicy()
    {
        $this->defaultSeo(trans(self::SEO_TITLE_PATH.'privacy_policy').' - '.trans('back/seo/defaults.default_title'));        
        return view('statics.privacyPolicy');
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
        //$arr_ip = geoip(request()->ip());
        $arr_ip = geoip('41.143.20.230');
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
            'amount' => 'required|required|between:0,99999999.99',
            'devise' => 'string|required',
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
