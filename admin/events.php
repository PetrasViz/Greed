<?php
include('../includes/db.php');
include('../includes/event.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

// Implement code to manage events
?>
