<?php
function createEvent($type, $points) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO events (type, points) VALUES (?, ?)");
    return $stmt->execute([$type, $points]);
}

function registerEvent($name, $eventType, $participants, $item = null) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO events (name, type, item) VALUES (?, ?, ?)");
    $stmt->execute([$name, $eventType, $item]);
    $eventId = $pdo->lastInsertId();

    foreach ($participants as $participant) {
        $stmt = $pdo->prepare("INSERT INTO event_participants (event_id, user_id) VALUES (?, ?)");
        $stmt->execute([$eventId, $participant]);
    }
    return $eventId;
}
?>
