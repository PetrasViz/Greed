<?php
function getUserPermissions($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM permissions WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch();
}
?>
