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
        $this->middleware('ajax', ['only' => ['getProductionsData']]);
        $this->productionRepository = $productionRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
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
                    return Form::open(['method' => 'DELETE', 'route' => ['production.destroy', $production->id]]).
                    Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']).
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
			$this->tagRepository->store($production, $request->tags);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
