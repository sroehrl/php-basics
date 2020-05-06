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
function retrieveSession($key)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
}

$app = new \Base\Router('/views/main.html', 'Home');

$substitutions = [
    'base' => getenv('APP_WEB_ROOT'),
    'title' => $app->title,
    'home' => generateRoute(),
    'navs' => [
        [
            'href' => generateRoute('about'),
            'title' => 'About',
            'show' => true
        ],
        [
            'href' => generateRoute('advanced'),
            'title' => 'Advanced',
            'show' => true
        ],
        [
            'href' => generateRoute('signup'),
            'title' => 'Signup',
            'show' => !isset($_SESSION['user'])
        ],
        [
            'href' => generateRoute('login'),
            'title' => 'Login',
            'show' => !isset($_SESSION['user'])
        ],
        [
            'href' => generateRoute('login') . '?logout=true',
            'title' => 'Logout',
            'show' => isset($_SESSION['user'])
        ]
    ],
    'user' => retrieveSession('user'),
    'content' => $app->currentRoute->view
];


echo $app->output($substitutions);


