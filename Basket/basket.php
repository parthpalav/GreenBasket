<?php
session_start();
require_once '../connect.php';

$items = [];
$subtotal = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_basket'])) {
        $clearQuery = $conn->prepare("DELETE FROM Basket WHERE user_id = ? AND status = 'in_cart'");
        $clearQuery->execute([$user_id]);
        header("Location: basket.php");
    }

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

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'seller'): ?>
                <li><a href="../Seller/sellerform.php">Sell</a></li>
            <?php else: ?>
                <li><a href="../Donation/donation.php">Donation</a></li>
            <?php endif; ?>

            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li id="backetli"><a href="../Minimarket/minimarket.php">Marketplace</a></li>
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
                <form method="POST" action="succesfultransaction.php">
                <input type="radio" name="payment" value="Credit Card" id="credit" checked> <label for="credit">Credit
                    Card</label><br>
                <input type="radio" name="payment" value="Debit Card" id="debit"> <label for="debit">Debit
                    Card</label><br>
                <input type="radio" name="payment" value="UPI" id="upi"> <label for="upi">UPI</label><br>
                <input type="radio" name="payment" value="Net Banking" id="netbanking"> <label
                    for="netbanking">NetBanking</label><br>
                <button type="submit" class="btn-proceed">Proceed to Payment</button>
            </form>
            </div>

            <form method="POST" style="margin-top: 10px;">
                <input type="hidden" name="clear_basket" value="1">
                <button type="submit" class="btn-clear">Clear Basket</button>
            </form>
        </div>
    </div>

</body>

</html>