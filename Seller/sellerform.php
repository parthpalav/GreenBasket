<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = null; // Initialize the image variable

    // Handle file upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
        $uploadDir = '../assets/m_img/'; // Folder to store images
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create the directory if it doesn't exist
        }

        $fileTmp = $_FILES['product_image']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['product_image']['name']); // Generate a unique filename
        $targetPath = $uploadDir . $fileName; // Full path to store the file

        if (move_uploaded_file($fileTmp, $targetPath)) {
            $image = $fileName; // Store the filename
        } else {
            $error = "Failed to upload product image.";
        }
    }

    // If no errors, insert product details into the database
    if (!isset($error)) {
        $expiry_date = !empty($_POST['expiry_date']) ? $_POST['expiry_date'] : null;

        // Insert data including the image filename and optional expiry_date
        $query = "INSERT INTO Products (seller_id, product_name, description, price, quantity_available, upload_date, expiry_date, product_image)
                  VALUES (:user_id, :name, :description, :price, :quantity, CURDATE(), :expiry_date, :image)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $product_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':expiry_date', $expiry_date);
        $stmt->bindParam(':image', $image);

        if ($stmt->execute()) {
            $success = "Product added successfully!";
        } else {
            $error = "Failed to add product.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product - Green Basket</title>
    <link rel="stylesheet" href="sellerform.css">
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
    <div class="form-container">
        <h2>List a Product for Sale</h2>
        <?php if (isset($error))
            echo "<p class='error'>$error</p>"; ?>
        <?php if (isset($success))
            echo "<p class='success'>$success</p>"; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label>Product Name:</label>
                <input type="text" name="product_name" required>
            </div>
            <div class="input-group">
                <label>Category:</label>
                <select name="category" required>
                    <option value="produce">Produce</option>
                    <option value="equipment">Farming Equipment</option>
                    <option value="vehicle">Farming Vehicles</option>
                    <option value="fertilizer">Fertilizers</option>
                    <option value="pesticide">Pesticides</option>
                </select>
            </div>
            <div class="input-group">
                <label>Description:</label>
                <textarea name="description" rows="4" required></textarea>
            </div>
            <div class="input-group">
                <label>Price (₹):</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <div class="input-group">
                <label>Quantity:</label>
                <input type="number" name="quantity" required>
            </div>
            <div class="input-group">
                <label>Expiry Date:</label>
                <input type="date" name="expiry_date"> 
            </div>
            <div class="input-group">
                <label>Product Image:</label>
                <input type="file" name="product_image" accept="image/*" required>
            </div>
            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>
</body>

</html>