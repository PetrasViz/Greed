<?php
session_start();
include('../includes/functions.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect non-admins to the main page or show an error message
    redirect('../user/index.php');
}

// Display admin dashboard content
?>
<h1>Admin Dashboard</h1>
<!-- Admin-specific content here -->
