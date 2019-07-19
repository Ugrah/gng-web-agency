<?php 

namespace App\Repositories;

use App\ProfileImage;

class ProfileImageRepository extends ResourceRepository
{
    public function __construct(ProfileImage $profileImage)
	{
		$this->model = $profileImage;
	}
}