<?php
// controllers/RegisterController.php

class RegisterController
{
    public function indexAction()
    {
        // Display the registration form
        include_once 'views/register.php';
    }

    public function registerAction()
    {
        // Handle registration logic
        // ...
        // Redirect to the login page on successful registration
        header('Location: /login');
    }
}
?>
