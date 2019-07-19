<?php 

namespace App\Repositories;

use App\ProductionImage;

class ProductionImageRepository extends ResourceRepository
{
    public function __construct(ProductionImage $productionImage)
	{
		$this->model = $productionImage;
	}
}