<?php
session_start();
include('includes/functions.php');

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectToRolePage($role) {
    switch ($role) {
        case 'admin':
            redirect('admin/index.php');
            break;
        case 'guild_leader':
        case 'guild_advisor':
        case 'guild_member':
            redirect('user/index.php');
            break;
        default:
            echo "Invalid role";
            exit();
    }
}

if (isLoggedIn()) {
    $role = $_SESSION['role'];
    redirectToRolePage($role);
} else {
    echo "<h1>Welcome to Guild Management</h1>";
    echo "<a href='user/login.php'>Login</a><br>";
    echo "<a href='user/register.php'>Register</a><br>";
}
?>
