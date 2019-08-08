<?php

namespace App\Http\Controllers;

use App\Repositories\EstimatedPriceRepository;

use Illuminate\Http\Request;
use DataTables;
use App\Production;
use App\AdminResponse;

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

    public function formFile()
    {
        return view('tests.form_file');
    }

    public function formFilePost(Request $request)
    {
        
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                do {
                    $imgName = time().'.'.$image->getClientOriginalExtension();
                } while(file_exists(config('images.tests').'/'.$imgName));
                $image->move(config('images.tests'), $imgName);  
                //$data[] = $name;
            }
        }

        /*
        $form= new Form();
        $form->images=json_encode($data);
        $form->save();
        */

        return back()->with('success', 'Your images has been successfully');
        //return response()->json();
    }

    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataProduction()
    {
        return DataTables::of(Production::query())
                ->rawColumns(['show', 'edit', 'delete'])
                ->addColumn('show', function($production){
                    return '<a href="'.route('production.show', ['id' => $production->id]).'" class="btn btn-success btn-block">Voir</a>';
                })
                ->addColumn('edit', function($production){
                    return '<a href="'.route('production.edit', ['id' => $production->id]).'" class="btn btn-warning btn-block">Edit</a>';
                })
                ->addColumn('delete', function($production){
                    return '<a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault();document.getElementById(\'delete-production-'.$production->id.'\').submit();">Delete</a>
                    <form id="delete-production-'.$production->id.'" action="'.route('production.destroy', ['id' => $production->id]).'" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>';
                })->make(true);
        // return response()->json(DataTables::of(Production::query())->make(true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayData()
    {
        return view('tests.displaydata');
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

    public function getSummernote()
    {
        return view('tests.summernote');
    }

    public function postSummernote(Request $request)
    {
        $this->validate($request, [
            'recipient' => 'required',
            'message' => 'required'
        ]);

        $recipient = $request->input('recipient');
        $message = $request->input('message');

        $dom = new \DOMDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            do {
                $image_name = time().$k.'.png';
            } while(file_exists( config('images.summernotes').'/'.$image_name ));
            $image_path = config('images.summernotes').'/'.$image_name;
            file_put_contents($image_path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_path);
        }
        $content = $dom->saveHTML();
        $AdminResponse = AdminResponse::create([
            'recipient' => $recipient,
            'content' => $message,
            'user_message_id' => 1
        ]);
        return redirect('summernote')->withOk('Elément enregistré');
    }
}
