<?php
session_start();
include('../includes/functions.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect non-admins to the main page or show an error message
    redirect('../user/index.php');
}

// Display admin auctions page content
?>
<h1>Manage Auctions</h1>
<!-- Admin-specific content here -->
