<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

	protected $fillable = ['tag','tag_url'];

	public function productions()
	{
		return $this->belongsToMany('App\Post');
	} 
}
