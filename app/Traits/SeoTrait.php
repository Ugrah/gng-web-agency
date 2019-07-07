<?php

namespace App\Traits;

use SEO;

trait SeoTrait {
    private function defaultSeo($pageTitle = null, $image = null)
    {
        $this->defaultMetas($pageTitle);
        $this->defaultOpenGraph($pageTitle, $image);
        $this->defaultTwitter($pageTitle, $image);
    }

    private function defaultMetas($pageTitle = null)
    {
        if($pageTitle){ SEO::setTitle($pageTitle, false); }
        SEO::setDescription( trans('back/seo/defaults.description') );

        SEO::metatags()->setKeywords(trans('back/seo/defaults.keywords'))
            ->addMeta('owner', config('infos.name'))
            ->addMeta('subject', trans('back/seo/defaults.subject'))
            ->addMeta('copyright', config('infos.name'))
            ->addMeta('language', (app()->getLocale() == 'fr') ? 'FR' : 'US')
            ->addMeta('Classification', 'Business')
            ->addMeta('designer', 'Ulrich Grah')
            ->addMeta('reply-to', 'contact@gngdev.com')
            ->addMeta('identifier-URL', url()->full())
            ->addMeta('url', url()->full())
            ->addMeta('coverage', 'Worldwide')
            ->addMeta('distribution', 'Global');
    }

    private function addKeywords($keywords)
    {
        SEO::metatags()->addKeyword($keywords);
    }

    private function defaultOpenGraph($pageTitle = null, $image = null)
    {
        if($pageTitle){ SEO::opengraph()->setTitle($pageTitle.' - '.SEO::metatags()->getDefaultTitle()); }
        if($image){ SEO::opengraph()->addImage($image); }
        SEO::opengraph()->addProperty('locale', (app()->getLocale() == 'fr') ? 'fr_FR' : 'en_US' );
    }

    private function defaultTwitter($pageTitle = null, $image = null)
    {
        if($pageTitle){ SEO::twitter()->setTitle($pageTitle.' - '.SEO::metatags()->getDefaultTitle()); }
        if($image){ SEO::twitter()->addImage($image); }
    }
}