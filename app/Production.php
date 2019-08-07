<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use DatePresenter;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'description_en', 'description_fr', 'image_name', 'screenshots', 'type', 'url', 'author',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function tags()
	{
		return $this->belongsToMany('App\Tag');
    }

    public function getImagePath()
    {
        return config('images.productions').'/'.$this->image_name;
    }

    public function getScreenshotPath($image_name)
    {
        return config('images.screenshots').'/'.$image_name;
    }

    public function getDescription()
    {
        return (session('locale') === 'fr') ? $this->description_fr : $this->description_en ;
    }
}
