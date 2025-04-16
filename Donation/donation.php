<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation form</title>
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

            <li><a href="../Donation/donation.php">Donation</a></li>
            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li><a href="../Basket/basket.php">Basket</a></li>
        </ul>
    </nav>

    <div class="donation-form-container">
        <h1>Make a Donation</h1>
        <form action="process_donation.php" method="POST">
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
                    <option value="Food">Food & Groceries</option>
                    <option value="Clothes">Clothing & Footwear</option>
                    <option value="Animal Care">Animal Care</option>
                    <option value="Money">Monetary Donation</option>
                    <option value="Tools">Agricultural Tools</option>
                    <option value="Health">Healthcare</option>
                    <option value="Farm Equipment">Farm Equipment</option>
                    <option value="Farm Equipment">Farm Equipment</option>
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