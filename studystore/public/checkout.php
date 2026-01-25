<?php
session_start();
include "../includes/header.php";
$error = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "1") {
        $error = "Please fill in all fields.";
    } else if ($_GET["error"] == "2") {
        $error = "Your cart is empty.";
    } else {
        $error = "Something went wrong.";
    }
}

if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    if ($error == "") {
        $error = "Your cart is empty.";
    }
}
?>
<main>
    <h2>Checkout</h2>
    <?php if ($error != ""): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="../controllers/checkout_action.php">
        <p>Enter Name:</p>
        <input type="text" name="customer_name" value="<?php echo isset($_POST['customer_name']) ? htmlspecialchars($_POST['customer_name']) : ''; ?>">

        <p>Email:</p>
        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

        <p>Phone:</p>
        <input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">

        <p>Address:</p>
        <input type="text" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">

        <br><br>
        <input type="submit" value="Place Order">
    </form>

    <p><a href="cart.php">Back to Cart</a></p>
</main>
<?php
include "../includes/footer.php";
?>