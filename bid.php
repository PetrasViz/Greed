<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $item_id = $_POST['item_id'];
    $bid_amount = $_POST['bid_amount'];
    $sql = "INSERT INTO bids (user_id, item_id, bid_amount, timestamp) VALUES ('$user_id', '$item_id', '$bid_amount', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Bid placed successfully.";
    } else {
        echo "Error placing bid: " . $conn->error;
    }
}

$sql = "SELECT id, item_name, description FROM loot";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid on Loot</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Bid on Loot</h2>
        <form method="post">
            <div class="form-group">
                <label for="item_id">Item:</label>
                <select class="form-control" id="item_id" name="item_id" required>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['item_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="bid_amount">Bid Amount:</label>
                <input type="number" class="form-control" id="bid_amount" name="bid_amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Bid</button>
        </form>
    </div>
</body>
</html>
