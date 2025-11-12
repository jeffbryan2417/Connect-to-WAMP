<?php
// connect.php - This file establishes a connection to the MySQL database

// MySQL server information
$servername = "localhost"; // The server hosting MySQL (localhost = your own computer)
$username = "root";        // MySQL username (default for WAMP is 'root')
$password = "";            // MySQL password (default is empty for WAMP)
$dbname = "student_db";    // The name of the database we created in phpMyAdmin

// Create a new connection to MySQL using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection failed, stop execution and show error message
    die("Connection failed: " . $conn->connect_error);
}

// If connection is successful, we can now use $conn to run queries in other PHP files
?>
