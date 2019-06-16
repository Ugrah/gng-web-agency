<?php

namespace App\Providers\Html;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder
{

    public function button_back()
	{
		return '<a href="javascript:history.back()" class="btn btn-primary">
            <i class="text-primary fas fa-arrow-left"></i> Retour
		</a>';
	}		

}