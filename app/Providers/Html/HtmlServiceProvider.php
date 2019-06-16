<?php

namespace App\Providers\Html;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as CollectiveFormbuilder;
use App\Providers\Html\FormBuilder;
use Html;

class HtmlServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Html::component('navbar_fixed', 'components.html.navbar_fixed', []);
        Html::component('navbar_default', 'components.html.navbar_default', []);
        Html::component('footer_main', 'components.html.footer_main', []);
        Html::component('carousel_home', 'components.html.carousel_home', []);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();
        $this->registerFormBuilder();
        $this->registerCardBuilder();

        $this->registerFormControl();
        $this->registerFormSubmit();
    }

    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function($app) {
            return new HtmlBuilder($app['url'], $app['view']);
        });
    }

    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->getToken());

            return $form->setSessionStore($app['session.store']);
        });
    }

    protected function registerCardBuilder()
	{
		$this->app->singleton('card', function()
		{
			return new CardBuilder;
		});
    }

    private function registerFormControl()
	{
		CollectiveFormbuilder::macro('control', function($type, $errors, $name, $attributes)
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
		CollectiveFormbuilder::macro('button_submit', function($texte)
        {
            return CollectiveFormbuilder::submit($texte, ['class' => 'btn btn-custom-gradient rounded px-3']);
        });		
	}
    
}