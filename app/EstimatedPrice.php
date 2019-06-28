<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimatedPrice extends Model
{
    protected $fillable = [
    	'name', 'email', 'qualityOption', 'typeOption', 'designOption', 'profitableOption', 'loginOption', 'userSpaceOption', 'websiteIntagrationOption', 'adminSpaceOption', 'languageOption', 'advancedFeaturesOption', 'statusProjectOption'
    ];

    public function getLastModification()
    {
        return new \DateTime($this->last_modification);
    }
}