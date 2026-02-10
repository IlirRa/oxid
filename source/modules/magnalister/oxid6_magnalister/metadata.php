<?php

$sMetadataVersion = '2.1';

$aModule = [
    'id' => 'ml_oxid6',
    'title' => 'magnalister OXID 6 Bridge',
    'description' => 'Integration layer to run magnalister library on OXID eShop 6.',
    'thumbnail' => '',
    'version' => '0.1.0',
    'author' => 'magnalister community',
    'url' => 'https://github.com/magnalister',
    'email' => 'support@magnalister.com',
    'extend' => [],
    'settings' => [
        [
            'group' => 'main',
            'name' => 'ml_oxid6_library_path',
            'type' => 'str',
            'value' => 'vendor/magnalister/magento2_magnalisterlibrary',
        ],
    ],
    'events' => [
        'onActivate' => '\\Magnalister\\Oxid6\\Bootstrap::onActivate',
    ],
];
