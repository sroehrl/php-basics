<?php


namespace Controllers;


use Models\Users;
use Neoan3\Apps\Template;

class Login extends Controller
{
    private $message = '';
    function __construct()
    {
        $this->checkLogout();
        $this->checkAuth();
        $this->checkLogin();

        $this->view = Template::embraceFromFile('/views/credentials.html', [
            'base' => getenv('APP_WEB_ROOT'),
            'message' => $this->message,
            'action' => 'login'
        ]);
    }
    function checkLogout()
    {
        if(isset($_GET['logout'])){
            unset($_SESSION['user']);
            $this->message = 'You are logged out.';
        }
    }
    function checkAuth()
    {
        if(isset($_SESSION['user'])){
            $this->message = 'You are logged in';
        }
    }
    function checkLogin()
    {

        if(!isset($_POST['user_name'])){
            return true;
        }
        $user = Users::login($_POST['user_name'], $_POST['password']);
        if(!$user){
            $this->message = 'Credentials not valid';
            return true;
        }
        // session
        $_SESSION['user'] = $user;
        header('Location: '. getenv('APP_WEB_ROOT'));

    }
}