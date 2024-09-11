<?php
include('../includes/db.php');
include('../includes/event.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name']);
    $type = sanitize($_POST['type']);
    $item = sanitize($_POST['item']);
    $participants = $_POST['participants'];

    $eventId = registerEvent($name, $type, $participants, $item);
    echo "Event Registered: $eventId";
}
?>
<form action="register-event.php" method="post">
    <input type="text" name="name" placeholder="Event Name" />
    <input type="text" name="type" placeholder="Event Type" />
    <input type="text" name="item" placeholder="Item Dropped" />
    <input type="text" name="participants[]" placeholder="Participant IDs (comma-separated)" />
    <input type="submit" value="Register Event" />
</form>
