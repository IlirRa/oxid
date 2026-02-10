<?php

$sMetadataVersion = '2.1';

$aModule = [
    'id' => 'ml_oxid6',
    'title' => 'magnalister OXID 6 Bridge',
    'description' => 'Integration layer to run magnalister library on OXID eShop 6.',
    'thumbnail' => '',
    'version' => '0.2.2',
    'author' => 'magnalister community',
    'url' => 'https://github.com/magnalister',
    'email' => 'support@magnalister.com',
    'extend' => [],
    'controllers' => [
        'ml_oxid6_iframe' => \Magnalister\Oxid6\Controller\Admin\IframeController::class,
    ],
    'templates' => [
        'ml_oxid6_iframe.tpl' => 'magnalister/oxid6_magnalister/views/admin/tpl/ml_oxid6_iframe.tpl',
    ],
    'settings' => [
        [
            'group' => 'main',
            'name' => 'ml_oxid6_library_path',
            'type' => 'str',
            'value' => 'vendor/redgecko/magnalisterlibrary',
        ],
        [
            'group' => 'main',
            'name' => 'ml_oxid6_iframe_url',
            'type' => 'str',
            'value' => 'https://www.magnalister.com/',
        ],
    ],
    'events' => [
        'onActivate' => '\\Magnalister\\Oxid6\\Bootstrap::onActivate',
    ],
];
