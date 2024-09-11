<?php
include('../includes/db.php');
include('../includes/auction.php');

session_start();
if ($_SESSION['role'] === 'admin') {
    redirect('../admin/index.php');
}

$auctions = getActiveAuctions();
foreach ($auctions as $auction) {
    echo "<div>";
    echo "<h3>{$auction['item']}</h3>";
    echo "<form action='place-bid.php' method='post'>";
    echo "<input type='hidden' name='auction_id' value='{$auction['id']}' />";
    echo "<input type='number' name='bid_amount' min='{$auction['min_bid']}' />";
    echo "<input type='submit' value='Place Bid' />";
    echo "</form>";
    echo "</div>";
}
?>
