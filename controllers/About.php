<?php


namespace Controller;


use Neoan3\Apps\Template;

class About
{
    public $view = '';
    function __construct()
    {
        $this->view = Template::embraceFromFile('views/about.html',[]);
    }

}