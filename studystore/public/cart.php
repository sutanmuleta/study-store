<?php
session_start();
include "../includes/header.php";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
?>

<main>
    <h2>My Cart</h2>

    <?php
    if (count($_SESSION["cart"]) == 0) {
        echo "<p>Your cart is empty.</p>";
    } else {
        echo "<ul>";

        foreach ($_SESSION["cart"] as $product_id => $qty) {
            echo "<li>";
            echo "Product ID: " . $product_id . " | Quantity: " . $qty;
            echo " <a href='cart_action.php?action=remove&id=" . $product_id . "'>Remove</a>";
            echo "</li>";
        }

        echo "</ul>";
    }
    ?>

    <p><a href="catalog.php">Back to Catalog</a></p>
</main>

<?php
include "../includes/footer.php";
?>
