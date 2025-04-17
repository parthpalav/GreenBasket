<?php
include '../connect.php';
session_start();

// Initialize variables for search and filter values
$search = isset($_GET['search']) ? $_GET['search'] : '';
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : '';
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '';

// Start building the query
$query = "SELECT * FROM Products WHERE product_name LIKE :search";

// Filter by price if provided
if ($minPrice != '') {
    $query .= " AND price >= :minPrice";
}
if ($maxPrice != '') {
    $query .= " AND price <= :maxPrice";
}

// Prepare and execute the query
$stmt = $conn->prepare($query);

// Bind parameters
$stmt->bindParam(':search', $searchParam);
$searchParam = "%" . $search . "%"; // Searching for product names that contain the search term

if ($minPrice != '') {
    $stmt->bindParam(':minPrice', $minPrice);
}
if ($maxPrice != '') {
    $stmt->bindParam(':maxPrice', $maxPrice);
}

$stmt->execute();
$products = $stmt->fetchAll();

// Check if products were retrieved successfully
if (!$products) {
    $error = "No products found.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <link rel="stylesheet" href="marketplace.css">
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
            <li id="backetli"><a href="../Basket/basket.php">Basket</a></li>
        </ul>
    </nav>

    <main>
        <div id="left">
            <div id="search">
                <h4>Search:</h4>
                <form method="GET">
                    <input type="text" id="searchBar" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search products">
                    <button type="submit">Search</button>
                </form>
            </div>

            <div id="header">
                <h1>Filters</h1>
            </div>

            <div id="section2">
                <h4>Price Range</h4>
                <form method="GET">
                    <label for="minPrice">Min:</label>
                    <input type="number" id="minPrice" name="minPrice" value="<?= htmlspecialchars($minPrice) ?>" placeholder="₹0"><br>

                    <label for="maxPrice">Max:</label>
                    <input type="number" id="maxPrice" name="maxPrice" value="<?= htmlspecialchars($maxPrice) ?>" placeholder="₹50000"><br><br>

                    <button type="submit">Apply Filters</button>
                </form>
                <button id="button" onclick="window.location.href = 'marketplace.php';">Clear Filters</button>
            </div>
        </div>

        <div id="right">
            <?php if (isset($error)): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php elseif (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div id="box">
                        <div style="height: 60%; overflow: hidden;">
                            <img src="../assets/m_img/<?= htmlspecialchars($product['product_image']) ?>" alt="Product Image"
                                style="width: 100%; height: 100%; object-fit: cover; border-bottom: 1px solid #ccc;">
                        </div>
                        <div style="padding: 10px;">
                            <h3 style="font-size: 1.1rem;"><?= htmlspecialchars($product['product_name']) ?></h3>
                            <p style="color: gray; font-size: 0.9rem;"><?= htmlspecialchars($product['description']) ?></p>
                            <p style="font-weight: bold;">₹<?= htmlspecialchars($product['price']) ?></p>
                            <p>Quantity: <?= htmlspecialchars($product['quantity_available']) ?></p>
                            <form action="add_to_cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity_available'] ?>" required>
                                <button type="submit" name="add_to_cart">Add to Cart</button>
                            </form>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>