<?php


namespace Controllers;


use Neoan3\Apps\Template;

class About extends Controller
{
    public $title = 'About me';

    function __construct()
    {
        $this->view = Template::embraceFromFile('views/about.html',[]);
    }
    function getAbout($body){
        return $body;
    }

}