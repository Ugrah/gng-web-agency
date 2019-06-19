<?php

namespace App\Providers\Html;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as CollectiveFormbuilder;
use App\Providers\Html\FormBuilder;
use App\Traits\FormBuilderTrait;
use App\Traits\HtmlBuilderTrait;
use Html;
use Form;

class HtmlServiceProvider extends ServiceProvider
{
    use FormBuilderTrait;
    use HtmlBuilderTrait;

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
        Html::component('go_to_url', 'components.html.go_to_url', ['url','text']);
        Html::component('card_img', 'components.html.card_img', ['imgPath','title', 'textRight', 'textLeft', 'footer']);

        Form::component('radio_label_img', 'components.form.radio_label_img' ,['idLabel', 'optionName', 'optionValue', 'dataQuestion', 'dataCost', 'imgPath', 'title']);
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
        $this->registerHtmlButtonBack();
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
}