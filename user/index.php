<?php
session_start();
include('../includes/functions.php');

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdminOrLeader() {
    return isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'guild_leader']);
}

if (isLoggedIn()) {
    $role = $_SESSION['role'];
    echo "<h1>Welcome to the Guild Management System</h1>";

    if (isAdminOrLeader()) {
        echo "<a href='admin/index.php'>Admin Dashboard</a><br>";
        echo "<a href='admin/auctions.php'>Manage Auctions</a><br>";
    }

    echo "<a href='user/auctions.php'>Auctions</a><br>";
    echo "<a href='user/auction-history.php'>Auction History</a><br>";
    echo "<a href='user/event-history.php'>Event History</a><br>";
    echo "<a href='user/profile.php'>Personal Profile</a><br>";
    echo "<a href='user/logout.php'>Logout</a><br>";
} else {
    echo "<h1>Welcome to Guild Management</h1>";
    echo "<a href='user/login.php'>Login</a><br>";
    echo "<a href='user/register.php'>Register</a><br>";
}
?>
