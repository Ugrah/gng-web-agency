<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminResponse extends Model
{
    use SoftDeletes;

    public function userMessage() 
	{
		return $this->belongsTo('App\UserMessage');
	}
}
