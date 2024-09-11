<?php
function createAuction($item, $minBid, $eventId) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO auctions (item, min_bid, event_id) VALUES (?, ?, ?)");
    return $stmt->execute([$item, $minBid, $eventId]);
}

function placeBid($auctionId, $userId, $bidAmount) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO bids (auction_id, user_id, amount) VALUES (?, ?, ?)");
    return $stmt->execute([$auctionId, $userId, $bidAmount]);
}

function getActiveAuctions() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM auctions WHERE status = 'active'");
    return $stmt->fetchAll();
}
?>
