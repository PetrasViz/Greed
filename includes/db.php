<?php
$host = 'localhost';
$db = 'u252309147_greedloot';
$user = 'u252309147_greedyadmin';
$pass = '?j8M>M=2Zgi';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
