<?php
// Database credentials
$servername = "localhost";  // Database server (usually 'localhost' if running locally)
$username = "root";         // Your MySQL username (default is usually 'root')
$password = "";             // Your MySQL password (leave empty for default)
$dbname = "fitzone";        // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Uncomment below to check the connection
// echo "Connected successfully to database.";
?>
