<?php

namespace App\Http\Controllers;

use App\Repositories\EstimatedPriceRepository;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(EstimatedPriceRepository $estimatedPriceRepository){
        $this->middleware('ajax', ['only' => ['testPost']]);
        $this->estimatedPriceRepository = $estimatedPriceRepository;
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
