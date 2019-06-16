<?php

namespace App\Providers\Html;

use Collective\Html\FormBuilder as CollectiveFormbuilder;
use Request;

class FormBuilder extends CollectiveFormbuilder
{

	public function control($type, $errors, $name, $attributes)
	{
        $value = \Request::old($name) ? \Request::old($name) : null;
        if(is_string($attributes))
        {
            $attributes = ['class' => 'form-control', 'placeholder' => $attributes];
        }
        
		return sprintf('
            <div class="form-group %s">
                %s
                %s
            </div>',
            $errors->has($name) ? 'has-error' : '',
            call_user_func_array(['Form', $type], [$name, $value, $attributes]),
            $errors->first($name, '<small class="help-block text-danger">:message</small>')
		);
	}	

	public function button_submit($texte)
	{
		return parent::submit($texte, ['class' => 'btn btn-custom-gradient rounded px-3']);
	}		

}