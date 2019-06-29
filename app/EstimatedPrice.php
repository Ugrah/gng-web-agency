<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimatedPrice extends Model
{
    protected $fillable = [
    	'name', 'email', 'amount', 'devise', 'qualityOption', 'typeOption', 'designOption', 'profitableOption', 'loginOption', 'userSpaceOption', 'websiteIntagrationOption', 'adminSpaceOption', 'languageOption', 'advancedFeaturesOption', 'statusProjectOption'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'amount', 'devise',
    ];

    public function getLastModification()
    {
        return new \DateTime($this->last_modification);
    }
}