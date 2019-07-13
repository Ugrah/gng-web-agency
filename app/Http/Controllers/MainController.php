<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Jobs\ChangeLocale;
use App\Repositories\EstimatedPriceRepository;
use App\Repositories\UserMessageRepository;
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
    protected $userMessageRepository;

    public function __construct(EstimatedPriceRepository $estimatedPriceRepository, UserMessageRepository $userMessageRepository){
        $this->middleware('ajax', ['only' => ['pricesPost']]);
        $this->estimatedPriceRepository = $estimatedPriceRepository;
        $this->userMessageRepository = $userMessageRepository;
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
        // Store userMessage in db
        $request->merge(['userIpAdress' => request()->ip()]);
        $this->userMessageRepository->store($request->all());

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

}
