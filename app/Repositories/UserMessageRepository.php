<?php 

namespace App\Repositories;

use App\UserMessage;

class UserMessageRepository extends ResourceRepository
{
    public function __construct(UserMessage $userMessage)
	{
		$this->model = $userMessage;
	}

	public function getLastMessage($limit)
	{
		return $this->model->orderBy('created_at', 'desc')->limit($limit)->get();
	}

	public function getNewMessageCount()
	{
		return $this->model->where('read', '=', false)->count();
	}
}