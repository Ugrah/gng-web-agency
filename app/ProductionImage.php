<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'production_id' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function production()
	{
		return $this->belongsTo('App\Production');
	}
}
