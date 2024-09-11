<?php
include('../includes/db.php');
include('../includes/auction.php');

session_start();
if ($_SESSION['role'] !== 'admin') {
    redirect('../user/index.php');
}

$auctions = getActiveAuctions();
foreach ($auctions as $auction) {
    echo "<div>{$auction['item']} - Minimum Bid: {$auction['min_bid']}</div>";
}
?>
