<?php
session_start();
require_once '../connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Login/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch items in cart
$sql = "SELECT b.product_id, p.product_name, p.price, b.quantity
        FROM Basket b
        JOIN Products p ON b.product_id = p.product_id
        WHERE b.user_id = ? AND b.status = 'in_cart'";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total
$total = 0;
foreach ($items as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Get selected payment method from previous form (fallback to 'Credit Card')
$payment_mode = 'Credit Card';
if (isset($_POST['payment'])) {
    $valid_modes = ['UPI', 'Credit Card', 'Debit Card', 'Net Banking'];
    if (in_array($_POST['payment'], $valid_modes)) {
        $payment_mode = $_POST['payment'];
    }
}

if ($total > 0) {
    // Insert into Payments table
    $insert = $conn->prepare("INSERT INTO Payments (user_id, payment_date, amount, payment_mode, payment_for, reference_id, status)
                              VALUES (?, CURDATE(), ?, ?, 'Basket Purchase', NULL, 'Completed')");
    $insert->execute([$user_id, $total, $payment_mode]);

    // Get inserted payment ID
    $payment_id = $conn->lastInsertId();

    // Update basket items status to 'purchased'
    $update = $conn->prepare("UPDATE Basket SET status = 'purchased' WHERE user_id = ? AND status = 'in_cart'");
    $update->execute([$user_id]);

    echo "<script>alert('Transaction successful! Thank you.'); window.location.href='../Myprofile/myprofile.php';</script>";
} else {
    echo "<script>alert('No items in basket to complete transaction.'); window.location.href='basket.php';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success!</title>
    <link rel="stylesheet" href="succesfultransaction.css">
</head>

<body>
    <nav id="navbar">
        <ul>
            <li class="home-li"><a href="../Index/index.php">Green Basket</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../Login/logout.php">Sign Out</a></li>
            <?php else: ?>
                <li><a href="../Login/login.php">Login/SignUp</a></li>
            <?php endif; ?>

            <li><a href="../Donation/donation.php">Donation</a></li>
            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li><a href="../Basket/basket.php">Basket</a></li>
        </ul>
    </nav>

    <div class="success-container">
        <h1>Transaction Complete</h1>
    </div>

</body>
</html>
