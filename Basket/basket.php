<?php
session_start();
require_once '../connect.php';

$items = [];
$subtotal = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT p.product_name, p.price, b.quantity 
            FROM Basket b
            JOIN Products p ON b.product_id = p.product_id
            WHERE b.user_id = ? AND b.status = 'in_cart'";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="basket.css">
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

    <div class="basket-container">
        <div class="basket-left">
            <h2>Items in Your Basket</h2>
            <ul>
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <li class="basket-item">
                            <span class="item-name">
                                <?php echo htmlspecialchars($item['product_name']); ?>
                            </span>
                            <span class="item-quantity">x<?php echo $item['quantity']; ?></span>
                            <span class="item-price">
                                ₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No items in your basket.</li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="basket-right">
            <div class="subtotal-box">
                <h2>Subtotal</h2>
                <p>₹<?php echo number_format($subtotal, 2); ?></p>
            </div>

            <div class="payment-box">
                <h2>Select Payment Method</h2>
                <ul class="payment-options">
                    <li><input type="radio" name="payment" id="credit" checked> <label for="credit">Credit Card</label></li>
                    <li><input type="radio" name="payment" id="debit"> <label for="debit">Debit Card</label></li>
                    <li><input type="radio" name="payment" id="upi"> <label for="upi">UPI</label></li>
                    <li><input type="radio" name="payment" id="netbanking"> <label for="netbanking">NetBanking</label></li>
                </ul>
            </div>
            <div class="proceed-button">
                <a href="succesfultransaction.php" class="btn-proceed">Proceed to Payment</a>
            </div>
        </div>
    </div>

</body>

</html>