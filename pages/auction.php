<?php
include '../includes/config.php';
check_auth();

// Fetch active auctions
$stmt = $pdo->query("
    SELECT a.*, i.name AS item_name 
    FROM auctions a
    JOIN items i ON a.item_id = i.id
    WHERE a.status = 'open'
");
$auctions = $stmt->fetchAll();
?>

<?php include '../includes/header.php'; ?>
<h2>Active Auctions</h2>
<div class="row">
    <?php foreach ($auctions as $auction): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $auction['item_name'] ?></h5>
                    <p>Ends at: <?= date('Y-m-d H:i', strtotime($auction['end_time'])) ?></p>
                    <p>Current Bid: <?= get_highest_bid($pdo, $auction['id']) ?></p>
                    <button onclick="showBidModal(<?= $auction['id'] ?>)" class="btn btn-primary">Bid</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Bid Modal -->
<div class="modal fade" id="bidModal">
    <!-- Modal content here (use JavaScript to populate) -->
</div>

<script src="../scripts/auction.js"></script>
<?php include '../includes/footer.php'; ?>