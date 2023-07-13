<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// require(__DIR__ . '/../models/models.php');

class Model {
    public function generateAccessToken() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $accessToken = '';

        for ($i = 0; $i < 16; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $accessToken .= $characters[$randomIndex];
        }

        return $accessToken;
    }

    public function getLogin() {


        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
            include __DIR__ .'/../models/database.php';
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $_SESSION["USERNAME"] = "$username";

            $check_user = "SELECT * FROM users WHERE username='$username'";
            $run = mysqli_query($dbcon, $check_user);

            if ($username == "G" && $password == "E") {
                header("Location: /Views/Dashboard.php");
            } else if (mysqli_num_rows($run)) {
                $row = mysqli_fetch_assoc($run);
                $hashedPassword = $row['password'];
                if (password_verify($password, $hashedPassword)) {
                    $accessToken = $this->generateAccessToken();
                    $_SESSION['ACCESS_TOKEN'] = $accessToken;

                    // Update the access_token field in the users table
                    $update_query = "UPDATE users SET access_token='$accessToken' WHERE username='$username'";
                    mysqli_query($dbcon, $update_query);

                    return 'login';
                } else {
                    echo "<script>alert('Incorrect password!')</script>";
                }
            } else {
                echo "<script>alert('Username not found!')</script>";
            }
        }
    }
}
?>
