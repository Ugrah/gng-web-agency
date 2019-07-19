<?php 

namespace App\Repositories;

use App\Production;

class ProductionRepository extends ResourceRepository
{

    public function __construct(Production $production)
	{
		$this->model = $production;
    }
    
    public function queryWithProductionImagesAndTags()
	{
		return $this->model->with('productionImages', 'tags')
		->orderBy('productions.created_at', 'desc');		
	}

	public function getWithUProductionImagesAndTagsPaginate($n)
	{
		return $this->queryWithProductionImagesAndTags()->paginate($n);
	}

	public function getWithProductionImagesAndTagsForTagPaginate($tag, $n)
	{
		return $this->queryWithProductionImagesAndTags()
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
		$production->tags()->detach();
		$production->delete();
	}
}