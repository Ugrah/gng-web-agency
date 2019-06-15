<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;

class HtmlMacrosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFormControl();
        $this->registerFormSubmit();
    }

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

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
