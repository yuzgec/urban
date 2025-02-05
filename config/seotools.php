<?php

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Urban ATM Kabin İmalatı", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'Urban Kabin İmalatı - Dashboard'
            'description'  => 'Urban Kabin ATM kabini, WC Kabin, Otomatik kabin ve diğer kabin imalatlarını yapmaktadır. Lütfen iletişime geçiniz.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['atm kabin, kabin imalatı, güvenlik kabini, bilet gişesi,kabin üretimi'],
            'url'         =>  false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => '55NrhnJ3nJHUf_SocBaTfn74Nw12aDB_XrtIOyNNYSQ',
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Urban ATM Kabin İmalatı', // set false to total remove
            'description'  => 'Urban Kabin ATM kabini, WC Kabin, Otomatik kabin ve diğer kabin imalatlarını yapmaktadır. Lütfen iletişime geçiniz.', // set false to total remove
            'url'         =>  false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Urban ATM Kabin İmalatı',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Urban ATM Kabin İmalatı', // set false to total remove
            'description'  => 'Urban Kabin ATM kabini, WC Kabin, Otomatik kabin ve diğer kabin imalatlarını yapmaktadır. Lütfen iletişime geçiniz.', // set false to total remove
            'url'         =>  false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
