<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminResponse extends Model
{
	use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'recipient', 'content', 'user_message_id'];

    public function userMessage() 
	{
		return $this->belongsTo('App\UserMessage');
	}
}
