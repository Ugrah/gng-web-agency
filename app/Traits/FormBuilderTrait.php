<?php

namespace App\Traits;

use Collective\Html\FormBuilder;

trait FormBuilderTrait
{
    private function registerFormControl()
	{
		FormBuilder::macro('control', function($type, $errors, $name, $attributes)
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
        });		
    }

    private function registerFormSubmit()
	{
		FormBuilder::macro('button_submit', function($texte)
        {
            return FormBuilder::submit($texte, ['class' => 'btn btn-custom-gradient rounded px-3']);
        });		
    }
}