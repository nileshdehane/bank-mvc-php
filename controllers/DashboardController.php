<?php
// controllers/DashboardController.php

$currentDir = __DIR__;

class DashboardController
{
    public function indexAction()
    {
        // Check if the user is logged in, otherwise redirect to the login page
        // ...

        // Display the dashboard page
        include __DIR__ . '/../views/dashboard.php';
        $this->dashboard();
    }

    public function dashboard()
    {
        //require_once(__DIR__ . '/../controllers/DashboardController.php');
        //$dashboardController = new DashboardController();


            // Add entry to accounts table with this data
            // ...
        }

        //$dashboardController->indexAction();
    

        public function transfer()
        {
            include __DIR__ . '/../models/database.php';
        
            $username = $_SESSION['USERNAME'];
        
            $result = mysqli_query($dbcon, "SELECT * FROM users WHERE username = '$username'");
        
            $user = mysqli_fetch_assoc($result);
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $amount = $_POST['amount'];
                $remark = $_POST['remark'];
                $type = $_POST['type'];
                $user_id = $user['user_id'];
        
                // Get the current date and time
                $transactionTime = date('Y-m-d H:i:s');
        
                // Perform any necessary data validation
        
                // Check if the user has sufficient balance for withdrawal
                if ($type === 'withdrawal' && $amount > $user['balance']) {
                    echo "Insufficient balance for withdrawal.";
                    return;
                }
        
                // Update balance based on transaction type
                $this->updateBalance($user_id, $amount, $type);
        
                // Prepare the INSERT statement
                $stmt = mysqli_prepare($dbcon, "INSERT INTO accounts (user_id, transaction_type, amount, transaction_date, remarks) VALUES (?, ?, ?, ?, ?)");
        
                if (!$stmt) {
                    echo "Error during statement preparation: " . mysqli_error($dbcon);
                    exit();
                }
        
                // Bind the values
                mysqli_stmt_bind_param($stmt, "isdss", $user_id, $type, $amount, $transactionTime, $remark);
        
                // Execute the query
                mysqli_stmt_execute($stmt);
        
                // Check if the query was successful
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // Insertion successful
                    
                    header("Location: /bank/dashboard");
                    
                } else {
                    // Insertion failed
                    echo "Failed to insert data into the accounts table.";
                }
        
                // Close the statement
                mysqli_stmt_close($stmt);
            }
        }
        
        private function updateBalance($user_id, $amount, $transaction_type)
        {
            include __DIR__ . '/../models/database.php';
        
            // Update the balance based on the transaction type
            if ($transaction_type === 'deposit') {
                $updateQuery = "UPDATE users SET balance = balance + $amount WHERE user_id = $user_id";
            } else {
                $updateQuery = "UPDATE users SET balance = balance - $amount WHERE user_id = $user_id AND balance >= $amount";
            }
        
            mysqli_query($dbcon, $updateQuery);
        }
    }
?>
<script>
    // Prevent form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
    });
</script>
