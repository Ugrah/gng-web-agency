<?php

namespace App\Http\Controllers;

use App\Repositories\ProductionRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\ProductionCreateRequest;
use App\Http\Requests\ProductionUpdateRequest;
use Illuminate\Http\Request;
use DataTables;
use App\Production;
use Str;
use Form;
use File;
use Illuminate\Support\Facades\Input;

class ProductionController extends Controller
{
    protected $productionRepository;
    protected $tagRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductionRepository $productionRepository, TagRepository $tagRepository)
    {
        $this->middleware('admin');
        $this->middleware('ajax', ['only' => ['getProductionsData', 'removeScreenshot']]);
        $this->productionRepository = $productionRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductionsData()
    {
        return DataTables::of(Production::query())
                ->rawColumns(['description', 'show', 'edit', 'delete'])
                ->addColumn('description', function ($production) {
                    return (session('locale') === 'fr') ? Str::limit($production->description_fr, $limit = 130, $end = ' ...') : Str::limit($production->description_en, $limit = 130, $end = ' ...');
                })
                ->addColumn('show', function($production){
                    return '<a href="'.route('production.show', ['id' => $production->id]).'" class="btn btn-link btn-block">Voir</a>';
                })
                ->addColumn('edit', function($production){
                    return '<a href="'.route('production.edit', ['id' => $production->id]).'" class="btn btn-link btn-block">Edit</a>';
                })
                ->addColumn('delete', function($production){
                    return Form::open(['method' => 'DELETE', 'route' => ['production.destroy', $production->id], 'class' => 'delete-form']).
                    Form::button('<i class="fas fa-trash-alt fa-lg"></i>', [
                        'type' => 'submit',
                        'class'=> 'btn btn-danger btn-block',
                        'onclick'=>'return confirm("Are you sure?")'
                    ]).
                    Form::close();
                })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.productions.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.productions.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductionCreateRequest $request)
    {
        $screenshots_array = [];

        // Upload Main Image and put name in request
        if($request->hasFile('imageFile'))
        {
            $image = $request->file('imageFile');
            $chemin = config('images.productions');
            do {
                $imageName = time().'.'.$image->getClientOriginalExtension();
            } while(file_exists($chemin.'/'.$imageName));

            if($image->move($chemin, $imageName)) {
                $request->merge(['image_name' => $imageName]);
            }
        }
        
        // Upload Screenshots
        if($request->hasfile('screenshotFiles'))
        {
            foreach($request->file('screenshotFiles') as $screenshot)
            {
                do {
                    $screenshotName = time().'.'.$screenshot->getClientOriginalExtension();
                } while(file_exists(config('images.screenshots').'/'.$screenshotName));

                if($screenshot->move(config('images.screenshots'), $screenshotName)) {
                    $screenshots_array[] = $screenshotName;
                }  
            }
        }

        if( count($screenshots_array) > 0) {
            $request->merge(['screenshots' => json_encode($screenshots_array)]);
        }
        
        $production = $this->productionRepository->store($request->all());

        // Save Production's tags
		if(isset($request->tags)) 
		{
			$this->tagRepository->tagStore($production, $request->tags);
        }

		return redirect('production')->withOk('Elément ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production = $this->productionRepository->getById($id);
        return view('dashboard.productions.show', compact('production'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $production = $this->productionRepository->getById($id);
        return view('dashboard.productions.edit', compact('production'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductionUpdateRequest $request, $id)
    {
        $screenshots_array = [];
        $production = $this->productionRepository->getById($id);

        // Upload Main Image and put name in request
        if($request->hasFile('imageFile'))
        {
            $image = $request->file('imageFile');
            $chemin = config('images.productions');
            do {
                $imageName = time().'.'.$image->getClientOriginalExtension();
            } while(file_exists($chemin.'/'.$imageName));

            if($image->move($chemin, $imageName)) {
                //Delete old image if exists
                if(file_exists($chemin.'/'.$production->image_name)){
                    File::delete($chemin.'/'.$production->image_name);
                }
                //Update image_name
                $request->merge(['image_name' => $imageName]);
            }
        }
        
        // Upload Screenshots
        if($request->hasfile('screenshotFiles'))
        {
            $screenshots_array = json_decode($production->screenshots);
            foreach($request->file('screenshotFiles') as $screenshot)
            {
                do {
                    $screenshotName = time().'.'.$screenshot->getClientOriginalExtension();
                } while(file_exists(config('images.screenshots').'/'.$screenshotName));

                if($screenshot->move(config('images.screenshots'), $screenshotName)) {
                    $screenshots_array[] = $screenshotName;
                }  
            }
            $request->merge(['screenshots' => json_encode($screenshots_array)]);
        }

        $this->productionRepository->update($id, $request->all());
        
        // Save Production's tags
		if(isset($request->new_tags)) 
		{
			$this->tagRepository->tagStore($production, $request->new_tags);
        }

		return redirect('production')->withOk('Elément modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productionRepository->destroy($id);
        return redirect()->back()->withOk("La  production a été supprimée de la Base de données.");
    }

    /**
     * Detach the specified tag from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detachTag()
    {
        $production = $this->productionRepository->getById(Input::get('production'));
        $tag = $this->tagRepository->getById(Input::get('tag'));
        $production->tags()->detach($tag->id);
        
        return response()->json();
    }

    /**
     * Remove the specified image from uploads directory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeScreenshot()
    {
        $production = $this->productionRepository->getById(Input::get('production'));
        $image_name = Input::get('file');

        $screenshots_array = json_decode($production->screenshots);

        foreach (array_keys($screenshots_array, $image_name) as $key) {
            unset($screenshots_array[$key]);
            //Delete old screenshot if exists
            if(file_exists(config('images.screenshots').'/'.$image_name)){
                File::delete(config('images.screenshots').'/'.$image_name);
            }
        }

        $production->update(['screenshots' => json_encode($screenshots_array)]);

        return response()->json();
    }
}
