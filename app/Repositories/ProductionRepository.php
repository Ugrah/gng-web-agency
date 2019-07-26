<?php 

namespace App\Repositories;

use App\Production;
use File;

class ProductionRepository extends ResourceRepository
{

    public function __construct(Production $production)
	{
		$this->model = $production;
    }
    
    public function queryWithTags()
	{
		return Production::with('tags')->limit(100)->get();
	}

	public function getWithTagsPaginate($n)
	{
		return $this->queryWithTags()->paginate($n);
	}

	public function getWithTagsForTagPaginate($tag, $n)
	{
		return $this->queryWithTags()
		->whereHas('tags', function($q) use ($tag)
		{
		  $q->where('tags.tag_url', $tag);
		})->paginate($n);
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function destroy($id)
	{
		$production = $this->model->findOrFail($id);
		if(file_exists( config('images.productions').'/'.$production->image_name )){
			File::delete(config('images.productions').'/'.$production->image_name);
		}

		$screenshots_array = json_decode($production->screenshots);

		foreach($screenshots_array as $screenshot){
			if(file_exists( config('images.screenshots').'/'.$screenshot )){
				File::delete( config('images.screenshots').'/'.$screenshot );
			}
		}

		$production->tags()->detach();
		$production->delete();
	}
}