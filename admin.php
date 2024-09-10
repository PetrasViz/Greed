<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];
    $activity_description = $_POST['activity_description'];
    $sql = "INSERT INTO dkp (user_id, points, activity_description, timestamp) VALUES ('$user_id', '$points', '$activity_description', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Points assigned successfully.";
    } else {
        echo "Error assigning points: " . $conn->error;
    }
}

$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Assign Points</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Assign Points</h2>
        <form method="post">
            <div class="form-group">
                <label for="user_id">User:</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points" required>
            </div>
            <div class="form-group">
                <label for="activity_description">Activity Description:</label>
                <textarea class="form-control" id="activity_description" name="activity_description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Assign Points</button>
        </form>
    </div>
</body>
</html>
