<?php
include "../includes/header.php";
include "../config/db.php";
include "../models/OrderModel.php";

$order_id = (int) ($_GET["order_id"] ?? 0);

$order = getOrderById($pdo, $order_id);

if (!$order) {
    echo "<h2>Order Confirmation</h2>";
    echo "<p>Order not found.</p>";
    include "../includes/footer.php";
    exit;
}
$items = getOrderItems($pdo, $order_id);
?>
<h2>Order Confirmed</h2>
<p><strong>Order ID:</strong> <?php echo $order["id"]; ?></p>
<p><strong>Name:</strong> <?php echo $order["customer_name"]; ?></p>
<p><strong>Email:</strong> <?php echo $order["email"]; ?></p>
<p><strong>Phone:</strong> <?php echo $order["phone"]; ?></p>
<p><strong>Address:</strong> <?php echo $order["address"]; ?></p>
<p><strong>Date:</strong> <?php echo $order["created_at"]; ?></p>

<hr>
<h3>Items</h3>
<?php if (count($items) == 0): ?>
    <p>No items found for this order.</p>
<?php else: ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                Product ID: <?php echo $item["product_id"]; ?> |
                Qty: <?php echo $item["quantity"]; ?> |
                Price: $<?php echo $item["price"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<p><a href="orders.php">Back to Past Orders</a></p>
<?php include "../includes/footer.php"; ?>