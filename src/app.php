<?php

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;

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

$app['translator'] = $app->share(
        $app->extend('translator', function($translator, $app) {
            $translator->addLoader('yaml', new YamlFileLoader());

            $translator->addResource('yaml', __DIR__ . '/../locale/en.yml', 'en');

            return $translator;
        })
);
