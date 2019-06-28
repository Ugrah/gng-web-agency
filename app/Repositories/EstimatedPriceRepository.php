<?php 

namespace App\Repositories;

use App\EstimatedPrice;

class EstimatedPriceRepository extends ResourceRepository
{
    public function __construct(EstimatedPrice $estimatedPrice)
	{
		$this->model = $estimatedPrice;
	}
}