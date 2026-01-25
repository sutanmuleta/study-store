<?php
session_start();
include __DIR__ . "/../config/db.php";

// if cart  is empty
if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    header("Location: ../public/checkout.php?error=2");
    exit;
}


$customer_name = trim($_POST["customer_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$address = trim($_POST["address"] ?? "");

//  validation
if ($customer_name == "" || $email == "" || $phone == "" || $address == "") {
    header("Location: ../public/checkout.php?error=1");
    exit;
}

// order
$stmt = $pdo->prepare("INSERT INTO orders (customer_name, email, phone, address) VALUES (?, ?, ?, ?)");
$stmt->execute([$customer_name, $email, $phone, $address]);

$order_id = $pdo->lastInsertId();

// order items
foreach ($_SESSION["cart"] as $product_id => $qty) {
    $stmt2 = $pdo->prepare("SELECT price FROM products WHERE id = ?");
    $stmt2->execute([$product_id]);
    $product = $stmt2->fetch();

    $price = $product["price"] ?? 0;

    $stmt3 = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt3->execute([$order_id, $product_id, $qty, $price]);
}

// clear cart
$_SESSION["cart"] = array();
header("Location: ../public/confirmation.php?order_id=" . $order_id);
exit;