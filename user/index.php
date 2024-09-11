<?php
include('../includes/db.php');
include('../includes/functions.php');

session_start();
if ($_SESSION['role'] === 'admin') {
    redirect('../admin/index.php');
}

echo "<h1>Welcome to Guild Management</h1>";
echo "<a href='profile.php'>Manage Profile</a><br>";
echo "<a href='auctions.php'>Participate in Auctions</a><br>";
echo "<a href='auction-history.php'>Auction History</a><br>";
echo "<a href='event-history.php'>Event History</a><br>";
?>
