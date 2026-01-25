<?php
include "../includes/header.php";
include "../config/db.php";
include "../models/OrderModel.php";

$orders = getAllOrders($pdo);
?>
<main>
    <h2>Past Orders</h2>
    <?php if (count($orders) == 0): ?>
        <p>No orders have been placed yet.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>View</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order["id"]; ?></td>
                    <td><?php echo $order["customer_name"]; ?></td>
                    <td><?php echo $order["created_at"]; ?></td>
                    <td>
                        <a href="confirmation.php?order_id=<?php echo $order["id"]; ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <p style="margin-top:20px;">
        <a href="catalog.php">Back to Catalog</a>
    </p>
</main>
<?php include "../includes/footer.php"; ?>
