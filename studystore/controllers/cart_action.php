<?php
session_start();
include __DIR__ . "/../config/db.php";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

$action = $_GET["action"] ?? "";
$id = $_GET["id"] ?? "";

if ($action == "add" && $id != "") {
    if (!isset($_SESSION["cart"][$id])) {
        $_SESSION["cart"][$id] = 0;
    }
    $_SESSION["cart"][$id]++;
}

if ($action == "remove" && $id != "") {
    unset($_SESSION["cart"][$id]);
}


header("Location: ../public/cart.php");
exit;
