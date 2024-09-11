<?php
include('../includes/db.php');
include('../includes/permissions.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

// Implement code to display and manage permissions
?>
