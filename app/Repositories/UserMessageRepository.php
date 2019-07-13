<?php 

namespace App\Repositories;

use App\UserMessage;

class UserMessageRepository extends ResourceRepository
{
    public function __construct(UserMessage $userMessage)
	{
		$this->model = $userMessage;
	}
}