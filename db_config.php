<?php
// Database configuration
$servername = "localhost";
$username = "u252309147_greedyadmin";
$password = "?j8M>M=2Zgi";
$dbname = "u252309147_greedloot";

// Create connection TEST
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>