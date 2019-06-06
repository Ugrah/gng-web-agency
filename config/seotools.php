<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'GnG Dev Agency', // set false to total remove
            'description'  => 'Agence de développement web et marketing digital', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['website','creation','site','internet','web','agency','mobile','app','referencement','natural','seo'],
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
            'title'       => 'GnG Dev Agency', // set false to total remove
            'description' => 'Agence de développement web et marketing digital', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          'card'        => 'summary',
          'site'        => '@gngdev',
        ],
    ],
];
