<?php
include('../includes/db.php');
include('../includes/auction.php');

session_start();
if ($_SESSION['role'] === 'admin') {
    redirect('../admin/index.php');
}

// Implement code to display auction history
?>
