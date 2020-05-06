<?php


namespace Controllers;


use Neoan3\Apps\Template;

/**
 * Class Advanced
 * @package Controllers
 */
class Advanced extends Controller
{
    /**
     * @var array
     */
    public array $topics;

    /**
     * Advanced constructor.
     */
    function __construct()
    {

        $this->setTopics();
        $this->view = Template::embraceFromFile('views/advanced.html',[
            'topics' => $this->topics
        ]);
    }

    /**
     * sets public topics
     */
    function setTopics(): void
    {
        $this->topics =  [
            'set error warning',
            'xdebug',
            'testing',
            'docblock & declarations'
        ];
    }
}