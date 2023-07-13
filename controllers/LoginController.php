<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require(__DIR__ . '/../models/models.php');

$currentDir = __DIR__;

class LoginController
{
    public $model;
    
    public function __construct()
    {
        $this->models= new Model();//basic instantiate of the models class
    }
    
    public function log()
    {
        $reslt = $this->models->getlogin();
        
        if($reslt == 'login')
        { //here we have a type of menu within which the controller will decide page will get dumped onto the welcome page.
            $this->dashboard();
        }
        else
        {
            include __DIR__ .'/../views/login.php';
        }
    }

    public function dashboard()
    {
        require_once(__DIR__ . '/../controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->indexAction();
    }
    public function logout()
    {
        // Perform logout logic, clear session variables or user authentication tokens
        // Redirect to login page or display a success message
        session_start();
        session_destroy();
        header("Location: /bank/auth/login");
        exit();
    }
}

?>
