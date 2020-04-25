<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

use Neoan3\Apps\Template;

// setup
include 'startup.php';


function generateRoute($path = '')
{
    return getenv('APP_WEB_ROOT') . '/' . ($path !== '' ? $path . '/' : '') ;
}

$app = new \Base\Router('/views/main.html');

$substitutions = [
    'title' => $app->title,
    'home' => generateRoute(),
    'navs' => [
        [
            'href' => generateRoute('about'),
            'title' => 'About'
        ]
    ],
    'content' => $app->currentRoute->view
];


echo $app->output($substitutions);


