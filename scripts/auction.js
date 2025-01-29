function showBidModal(auctionId) {
    // Fetch auction details via AJAX and populate modal
    fetch(`get_auction.php?id=${auctionId}`)
        .then(response => response.json())
        .then(data => {
            // Update modal content and show
        });
}

// Auto-refresh auctions every 30 seconds
setInterval(() => {
    window.location.reload();
}, 30000);