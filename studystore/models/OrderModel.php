<?php

function getAllOrders($pdo) {
    $sql = "SELECT * FROM orders ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getOrderById($pdo, $order_id) {
    $sql = "SELECT * FROM orders WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getOrderItems($pdo, $order_id) {
    $sql = "SELECT * FROM order_items WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
