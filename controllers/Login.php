<?php


namespace Controllers;


use Models\Users;
use Neoan3\Apps\Template;

class Login extends Controller
{
    private $message = '';
    function __construct()
    {
        if(isset($_SESSION['user'])){
            $this->message = 'You are logged in';
        }
        if(isset($_POST['user_name'])){
            $this->doLogin();
        }
        $this->view = Template::embraceFromFile('/views/credentials.html', [
            'base' => getenv('APP_WEB_ROOT'),
            'message' => $this->message,
            'action' => 'login'
        ]);
    }
    function doLogin()
    {
        $user = Users::login($_POST['user_name'], $_POST['password']);
        if(!$user){
            $this->message = 'Credentials not valid';
        } else {
            // session
            $_SESSION['user'] = $user;
            $this->message = 'You are logged in';
        }

    }
}