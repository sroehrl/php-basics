<?php

namespace Base;

use Neoan3\Apps\Template;

class Router
{
    public $title = 'Homepage';
    public $currentRoute;
    private $skeleton;

    function __construct($htmlSkeleton)
    {
        $this->skeleton = $htmlSkeleton;
        $parts = explode('/', $_GET['route']);
        if ($parts[0] === 'api') {
            $this->apiRoute(ucfirst($parts[1]));
        } else {
            $this->pageRoute(ucfirst($parts[0]));
        }

    }

    function apiRoute($controller)
    {
        $this->constructController($controller);
        // what method
        $method = strtolower($_SERVER['REQUEST_METHOD']) . $controller;
        // retrieve payload
        $payload = [];
        foreach ($_REQUEST as $key => $value) {
            if ($key !== 'route') {
                $payload[$key] = $value;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($this->currentRoute->$method($payload));
        exit();
    }

    function constructController($controller)
    {
        $class = '\\Controllers\\' . $controller;
        $this->currentRoute = new $class();
    }

    function pageRoute($controller = 'Home')
    {
        $this->constructController($controller);
        $this->title = 'My project - ' . $controller;
    }

    function output($substitutions = [])
    {
        return Template::embraceFromFile($this->skeleton, $substitutions);
    }

}
