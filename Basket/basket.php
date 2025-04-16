<!-- PHP CONNECTION TO DATABASE WILL FETCH INFO FROM HERE -->
<?php
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
            <li><a href="../Login/login.php">Login/SignUp</a></li>
            <li><a href="../Donation/donation.php">Donation</a></li>
            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li><a href="../Basket/basket.php">Basket</a></li>
        </ul>
    </nav>
    <div id="content-wrapper">
        <div id="items">
            <h2>Items</h2>
            <ul>
                <?php foreach ($items as $item): ?>
                    <li><?php echo htmlspecialchars($item['name']); ?> - $<?php echo number_format($item['price'], 2); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div id="subtotal">
            <h2>Subtotal</h2>
            <p>$<?php echo number_format($subtotal, 2); ?></p>
        </div>
    </div>

</body>

</html>