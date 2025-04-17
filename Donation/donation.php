<?php
include '../connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $donation_category = isset($_POST['category']) ? $_POST['category'] : '';
    $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $donation_date = date('Y-m-d');

    try {
        $query = "INSERT INTO Donations (donor_name, email, category, quantity, address, donation_date)
                  VALUES (:name, :email, :category, :quantity, :address, :donation_date)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':category', $donation_category);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':donation_date', $donation_date);

        $stmt->execute();

        echo "<script>alert('Thank you for your donation!');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <link rel="stylesheet" href="donation.css">
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

    <div class="donation-form-container">
        <h1>Make a Donation</h1>
        <form action="donation.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="category">Donation Category:</label>
                <select id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="food and groceries">Food & Groceries</option>
                    <option value="clothing and footwear">Clothing & Footwear</option>
                    <option value="animal care">Animal Care</option>
                    <option value="monetory donation">Monetary Donation</option>
                    <option value="agricultural tools">Agricultural Tools</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="farm equipment">Farm Equipment</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Donation</button>
        </form>
    </div>
</body>

</html>