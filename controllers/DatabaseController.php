<?php
// controllers/DatabaseController.php

class DatabaseController
{
    private $host = 'localhost'; // Replace with your database host
    private $dbname = 'banking'; // Replace with your database name
    private $username = 'root'; // Replace with your database username
    private $password = ''; // Replace with your database password

    protected $db;

    public function __construct()
    {
        try {
            // Create a new PDO instance for database connection
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);

            // Set PDO error mode to exception for better error handling
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle the database connection error
            die('Database connection error: ' . $e->getMessage());
        }
    }
}
?>
