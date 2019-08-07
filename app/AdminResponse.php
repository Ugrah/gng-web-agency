<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminResponse extends Model
{
    //

    public function userMessage() 
	{
		return $this->belongsTo('App\UserMessage');
	}
}
