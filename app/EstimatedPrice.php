<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimatedPrice extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name', 'email', 'amount', 'devise', 'qualityOption', 'typeOption', 'designOption', 'profitableOption', 'loginOption', 'userSpaceOption', 'websiteIntagrationOption', 'adminSpaceOption', 'languageOption', 'advancedFeaturesOption', 'statusProjectOption', 'ipAdress',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'amount', 'devise', 'ipAdress',
    ];

    public function getLastModification()
    {
        return new \DateTime($this->last_modification);
    }
}