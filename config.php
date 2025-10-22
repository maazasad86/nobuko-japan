<?php
// Database configuration
$servername = "localhost";   // Server name (usually localhost)
$username   = "root";        // MySQL username
$password   = "";            // MySQL password (agar koi set nahi to blank rakho)
$database   = "nobuko";      // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    // echo "✅ Database connected successfully!";
}


?>
