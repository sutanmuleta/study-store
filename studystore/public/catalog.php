<?php
include '../includes/header.php';
include '../config/db.php';
?>

<main>
    <h2>Study Resources</h2>

    <?php
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll();

    if (count($products) === 0) {
        echo "<p>No products found.</p>";
    } else {
        foreach ($products as $product) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";
            echo "<p>" . htmlspecialchars($product['description']) . "</p>";
            echo "<p>Price: $" . $product['price'] . "</p>";
            echo "<hr>";
            echo "</div>";
        }
    }
    ?>
</main>

<?php
include '../includes/footer.php';
?>
