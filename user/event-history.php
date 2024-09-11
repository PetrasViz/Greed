<?php
include('../includes/db.php');
include('../includes/event.php');

session_start();
if ($_SESSION['role'] === 'admin') {
    redirect('../admin/index.php');
}

// Implement code to display event history
?>
