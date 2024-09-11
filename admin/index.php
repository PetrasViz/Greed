<?php
include('../includes/db.php');
include('../includes/functions.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

echo "<h1>Admin Dashboard</h1>";
echo "<a href='auctions.php'>Manage Auctions</a><br>";
echo "<a href='events.php'>Manage Events</a><br>";
echo "<a href='register-event.php'>Register Event</a><br>";
echo "<a href='permissions.php'>User Permissions</a><br>";
echo "<a href='users.php'>Manage Users</a><br>";
?>
