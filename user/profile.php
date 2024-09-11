<?php
include('../includes/db.php');
include('../includes/user.php');

session_start();
if ($_SESSION['role'] === 'admin') {
    redirect('../admin/index.php');
}

$user = getUserById($_SESSION['user_id']);
echo "<h1>Edit Profile</h1>";
echo "<form action='update-profile.php' method='post'>";
echo "<input type='text' name='display_name' value='{$user['display_name']}' />";
echo "<input type='email' name='email' value='{$user['email']}' />";
echo "<input type='submit' value='Update Profile' />";
echo "</form>";
?>
