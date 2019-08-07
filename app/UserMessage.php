<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMessage extends Model
{
    use DatePresenter;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'subject', 'content', 'user_ip_adress', 'read',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_ip_adress'
    ];

    public function adminResponses() 
    {
        return $this->hasMany('App\AdminToUser');
    }
}
