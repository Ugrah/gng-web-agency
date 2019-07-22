<?php 

namespace App\Repositories;

use App\Production;
use Illuminate\Support\Facades\DB;

class ProductionRepository extends ResourceRepository
{

    public function __construct(Production $production)
	{
		$this->model = $production;
    }
    
    public function queryWithTags()
	{
		return DB::table('productions')->get();
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
		$production->tags()->detach();
		$production->delete();
	}
}