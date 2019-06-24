<?php
return [

    'title' => 'Nos Tarifs',
    'from' => 'A partir de',

    /*
    |--------------------------------------------------------------------------
    | Sections
    |--------------------------------------------------------------------------
    |
    */
    'section0' => [
        'title' => 'Ce que GnG vous propose',
        'description' => 'Consultez notre guille tarifaire pour la création de site web ou lancez une estimation de votre application mobile.',
        'website' => [
            'name' => 'Site Internet',
            'showcase' => [
                'title' => 'Site de présentation (site vitrine)',
                'description' => 'Présentez votre activité de façon attractive',
            ],
            'portfolio' => [
                'title' => 'Portfolio',
                'description' => 'Présentez vos réalisations',
            ],
            'e_commerce' => [
                'title' => 'E-Commerce',
                'description' => 'Présentez votre gamme de produits et vendez en ligne en toute sécurité',
            ],
            'catalog' => [
                'title' => 'Catalogue',
                'description' => 'Présentez votre gamme de produit (sans vente en ligne)',
            ],
        ],
        'mobile_app' => [
            'name' => 'Application Mobile',
            'success_notif' => 'Votre Devis estimatif a été envoyé avec succès !',
            'start_title' => 'Combien coûte la création de mon application ?',
            'start_descr' => 'Calculez rapidement le coût pour créer votre application en répondant à ces questions.',
            'start_button' => 'Calculer',
            'previous_button_form' => 'Précedent',
            'questions' => [
                'item0' => [
                    'title' => 'Quel niveau de qualité recherchez-vous?',
                    'option0' => 'Qualité optimale',
                    'option1' => 'Bon rapport qualité/prix',
                    'option2' => 'La qualité importe peu',
                ],
                'item1' => [
                    'title' => 'De quel type d\'application mobile avez-vous besoin?',
                    'option0' => 'Application Android',
                    'option1' => 'Application iPhone',
                    'option2' => 'Application Android + iPhone',
                ],
                'item2' => [
                    'title' => '',
                    'option0' => '',
                    'option1' => '',
                    'option2' => '',
                ]
            ]
        ],
    ],
];