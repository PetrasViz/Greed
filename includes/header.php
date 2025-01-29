<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guild Loot System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Guild Loot</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="../pages/dashboard.php">Dashboard</a>
                    <a class="nav-link" href="../pages/events.php">Events</a>
                    <a class="nav-link" href="../pages/auction.php">Auction</a>
                    <a class="nav-link" href="../pages/profile.php">Profile</a>
                    <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'guild_admin'): ?>
                        <a class="nav-link" href="../pages/management.php">Management</a>
                    <?php endif; ?>
                </div>
            </div>
            <a href="../scripts/logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">