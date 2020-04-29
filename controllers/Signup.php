<?php


namespace Controllers;


use Models\Users;
use Neoan3\Apps\DbException;
use Neoan3\Apps\Template;

class Signup extends Controller
{
    public $message = '';
    function __construct()
    {
        if(isset($_POST['user_name'])){
            $this->doSignUp();
        }
        $this->view = Template::embraceFromFile('/views/credentials.html', [
            'base' => getenv('APP_WEB_ROOT'),
            'message' => $this->message,
            'action' => 'sign up'
        ]);
    }
    function doSignUp()
    {
        try{
            $user = new Users($_POST);
            $this->message = 'You can now log in';
        } catch (DbException $e){
            $this->message = 'The username is already taken';
        }

    }
}