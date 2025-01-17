<?php

return [
    'adminEmail' => 'lodpod@yandex.ru',
    'senderEmail' => 'lodpod@yandex.ru',
    'bsVersion' => '5.x',// версия bootstrap для kartic
//    'senderName' => 'Example.com mailer',

    'redactor'=>[
        'cropImg' => 1200,
        'styleContent' => 'http://frontend/css/style.css'//подцепить стиль шаблона frontend (добавить в .htaccess: Header set Access-Control-Allow-Origin: http://backend)
    ],

    'contentRedactor' => [
        'url' => '/upload/contentRedactor',
        'path' => '@app/web/upload/contentRedactor',
    ],
    'content' => [
        'preview' => [
//            'dir' => '@app/web/upload/content/',
            'dir' => '@app/web/upload/cat_content/',
            'urlDir' => '/upload/cat_content/',
            'defaultCrop' => [100, 100],
            'crop' => [
                [80, 80, 'q', 'fit'],
                [400, 0, 'min', 'fit'],
                [1200, 0, 'max', 'fit'],
            ]
        ],
        'logo' => [
//            'dir' => '@app/web/upload/logo/',
            'dir' => '@app/web/upload/cat_content/',
            'urlDir' => '/upload/cat_content/',
            'defaultCrop' => [100, 75],
            'crop' => [
                [80, 80, 'q', 'fit'],
                [400, 0, 'min', 'fit'],
                [1200, 0, 'max', 'fit'],
            ]
        ],
        'pagination' => 10
    ],
    // категории контент
    'catContent' => [
        'preview' => [
            'dir' => '@app/web/upload/cat_content/',
            'urlDir' => '/upload/cat_content/',
            'defaultCrop' => [100, 75],
            'crop' => [
                [400, 576, 'min', 'fit'],
                [1200, 0, 'max', 'widen'],
            ]
        ]
    ],
    'runtimeWidgets' => [
        'frontend\widgets\contentBlock\ContentBlock',
        'frontend\widgets\noomerFond\NumberWidget',
        'frontend\widgets\content\ContentWidget',
        'frontend\widgets\photoSlider\PhotoSlider',
//        'common\widgets\unitegallery\UnitePhotoGallery',
        'frontend\widgets\forms\feedback\FeedbackWidget',
    ],
    'gallery' => [
        'dir' => '@app/web/upload/gallery/',
        'urlDir' => '/upload/gallery/',
        'default' => ['w' => 100, 'h' => 75, 'type' => 'fit'],
        'min' => ['w' => 1000, 'h' => 570, 'type' => 'fit'],
        'max' => ['w' => 1440, 'h' => 900, 'type' => 'widen']
    ],
];
