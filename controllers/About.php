<?php


namespace Controllers;


use Neoan3\Apps\Template;

class About extends Controller
{
    public $title = 'About me';

    function __construct()
    {
        $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'about';
        $tabNavigationLinks = [
            [
                'name' => 'About me',
                'link' => 'about',
            ],
            [
                'name' => 'My accounts',
                'link' => 'accounts',
            ],

        ];
        foreach ($tabNavigationLinks as $i => $navigationLink){
            $tabNavigationLinks[$i]['class'] = $activeTab == $navigationLink['link'] ? 'active' : '';
        }

        $this->view = Template::embraceFromFile('views/about.html', [
            'tab' => $activeTab,
            'tabNavigationLinks' => $tabNavigationLinks
        ]);
    }

    function getAbout($body)
    {
        return $body;
    }

}