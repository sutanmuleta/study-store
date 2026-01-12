<?php
session_start();
include "../includes/header.php";
include "../config/db.php";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if (isset($_POST["customer_name"])) {

    $customer_name = $_POST["customer_name"];

    if ($customer_name == "") {
        echo "<p style='color:red;'>Please enter your name.</p>";
    } else {

        if (count($_SESSION["cart"]) == 0) {
            echo "<p style='color:red;'>Your cart is empty.</p>";
        } else {

            // add order
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name) VALUES (?)");
            $stmt->execute([$customer_name]);

            $order_id = $pdo->lastInsertId();

            // add items
            foreach ($_SESSION["cart"] as $product_id => $qty) {

                $stmt2 = $pdo->prepare("SELECT price FROM products WHERE id = ?");
                $stmt2->execute([$product_id]);
                $product = $stmt2->fetch();

                if ($product) {
                    $price = $product["price"];

                    $stmt3 = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                    $stmt3->execute([$order_id, $product_id, $qty, $price]);
                }
            }

            // clear cart
            $_SESSION["cart"] = array();

            header("Location: confirmation.php?order_id=" . $order_id);
            exit;
        }
    }
}
?>

<main>
    <h2>Checkout</h2>

    <form method="POST" action="checkout.php">
        <p>Your Name:</p>
        <input type="text" name="customer_name">
        <br><br>
        <input type="submit" value="Place Order">
    </form>

    <p><a href="cart.php">Back to Cart</a></p>
</main>

<?php
include "../includes/footer.php";
?>
