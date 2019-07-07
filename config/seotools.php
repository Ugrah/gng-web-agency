<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => config('infos.name').' - Agence web - Agence de communication, Casablanca & Abidjan', // set false to total remove
            'description'  => config('seoapp.'.app()->getLocale().'.description'), // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => config('infos.name').'  - Agence web - Agence de communication, Casablanca & Abidjan', // set false to total remove
            'description' => config('seoapp.'.app()->getLocale().'.description'), // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            //'locale'   => (app()->getLocale() == 'fr') ? 'fr_FR' : 'en_US',
            'site_name'   => config('infos.name'),
            'email'       => 'webmaster@gngdev.com',
            'phone_number' => '+212600000000',
            'latitude' => 33.5922,
            'longitude' => -7.6184,
            'street-address' => '1 OP Najmat S/M GH9 ETG 3 Appt 18 IMM A',
            'locality' => 'Casablanca',
            'region' => 'Casablanca-Settat',
            'postal-code' => '20400',
            'country-name' => 'Morocco',
            'images'      => [],
            'videos'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'title'       => config('infos.name').'  - Agence web - Agence de communication, Casablanca & Abidjan', // set false to total remove
            'description' => config('seoapp.'.app()->getLocale().'.description'), // set false to total remove
            //'locale'   => (app()->getLocale() == 'fr') ? 'fr_FR' : 'en_US',
            //'site_name'   => config('infos.name'),
            'images'      => [],
            'videos'      => [],
            'card'        => 'summary',
            'site'        => '@gngdev',
        ],
    ],
];
