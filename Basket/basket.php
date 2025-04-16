<?php
session_start();

// MOCK DATA UNTIL BACKEND 
$items = [
    ['name' => 'Apple', 'price' => 1.2],
    ['name' => 'Banana', 'price' => 0.8],
    ['name' => 'Orange', 'price' => 1.5],
];

$subtotal = 0;
foreach ($items as $item) {
    $subtotal += $item['price'];
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
                <?php foreach ($items as $item): ?>
                    <li class="basket-item">
                        <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                        <span class="item-price">₹<?php echo number_format($item['price'], 2); ?></span>
                    </li>
                <?php endforeach; ?>
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