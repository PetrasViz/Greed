<?php
include('../includes/db.php');
include('../includes/user.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

$users = $pdo->query("SELECT * FROM users")->fetchAll();
foreach ($users as $user) {
    echo "<div>";
    echo "<h3>{$user['email']}</h3>";
    echo "<a href='delete-user.php?id={$user['id']}'>Delete User</a>";
    echo "</div>";
}
?>
