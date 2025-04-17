<?php
session_start();
include '../connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Optional: Check if item already in cart
    $check = $conn->prepare("SELECT * FROM Basket WHERE user_id = :user_id AND product_id = :product_id AND status = 'in_cart'");
    $check->execute(['user_id' => $user_id, 'product_id' => $product_id]);

    if ($check->rowCount() > 0) {
        // Already in cart, update quantity
        $update = $conn->prepare("UPDATE Basket SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id AND status = 'in_cart'");
        $update->execute(['quantity' => $quantity, 'user_id' => $user_id, 'product_id' => $product_id]);
    } else {
        // Insert new cart item
        $stmt = $conn->prepare("INSERT INTO Basket (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id, 'quantity' => $quantity]);
    }

    header("Location: marketplace.php?success=1");
    exit();
} else {
    echo "Invalid request.";
}
?>
