<?php

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

$app->register(new UrlGeneratorServiceProvider());

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/../var/log/app.log',
    'monolog.name' => 'app',
    'monolog.level' => 'WARNING'
));

$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__ . '/../resource/view/', __DIR__ . '/../resource/view/main/')
));

$app->register(new TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));
