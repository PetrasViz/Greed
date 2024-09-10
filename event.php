<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'leader') {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $leader_id = $_SESSION['user_id'];
    $points = $_POST['points'];
    $sql = "INSERT INTO events (event_name, description, event_date, leader_id, points) VALUES ('$event_name', '$description', '$event_date', '$leader_id', '$points')";
    if ($conn->query($sql) === TRUE) {
        echo "Event registered successfully.";
    } else {
        echo "Error registering event: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Event</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Register Event</h2>
        <form method="post">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points" required>
            </div>
            <button type="submit" class="btn btn-primary">Register Event</button>
        </form>
    </div>
</body>
</html>
