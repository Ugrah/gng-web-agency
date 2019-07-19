<?php

namespace App\Http\Controllers;

use App\Repositories\ProductionRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\ProductionCreateRequest;
use App\Http\Requests\ProductionUpdateRequest;
use Illuminate\Http\Request;

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
        $this->productionRepository = $productionRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = $this->productionRepository->queryWithProductionImagesAndTags();
        return view('dashboard.productions.index', compact('productions'));        
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
        $request->merge(['imageName' => 'image_name']);
        // Upload Image and put name in request
        
        if($request->hasFile('imageFile'))
        {
            $image = $request->file('imageFile');
            $chemin = config('images.productions');
            do {
                $imageName = time().'.'.$image->getClientOriginalExtension();
            } while(file_exists($chemin.'/'.$imageName));
            $image->move($chemin, $imageName);
            $request->merge(['imageName' => $imageName]);
        }
        $production = $this->productionRepository->store($request->all());
        
        // Upload each ProductionImages
        if($request->input('images'))
        {
            foreach ($request->input('images') as $img) {
                $img = $request->file('image');
                $chemin = config('images.productions');
                do {
                    $imgName = time().'.'.$img->getClientOriginalExtension();
                } while(file_exists($chemin.'/'.$imgName));
                $img->move($chemin, $imgName);
                $this->productionImageRepository->create([
                    'name' => $imgName,
                    'production_id' => $production->id,
                ]);
            }
        }

		if(isset($request->tags)) 
		{
			$this->tagRepository->store($production, $$request->tags);
        }

        // return response()->json();

		return redirect(route('production.index'))->withOk('Elément ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
