<?php
// Include the connection file to connect to the database
include 'connect.php';

// Check if the form was submitted and a product image was uploaded
if (isset($_POST['submit']) && isset($_POST['product_id']) && isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
    $product_id = $_POST['product_id']; // Get the product_id from the user input

    // Fetch the product to verify the id exists
    $query = "SELECT * FROM Products WHERE product_id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch();

    // If the product does not exist, show an error
    if (!$product) {
        $error = "Product not found.";
    } else {
        $uploadDir = '../assets/m_img/'; // Directory to store uploaded images

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Get file details
        $fileTmp = $_FILES['product_image']['tmp_name'];
        $fileName = basename($_FILES['product_image']['name']); // Use original file name
        $targetPath = $uploadDir . $fileName;

        // Move the uploaded image to the target directory
        if (move_uploaded_file($fileTmp, $targetPath)) {
            // Update the product image in the database with original file name
            $query = "UPDATE Products SET product_image = :product_image WHERE product_id = :product_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':product_image', $fileName);
            $stmt->bindParam(':product_id', $product_id);

            if ($stmt->execute()) {
                $success = "Product image updated successfully!";
            } else {
                $error = "Failed to update product image.";
            }
        } else {
            $error = "Failed to upload image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product Image</title>
</head>
<body>
    <h1>Upload New Product Image</h1>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>

    <form action="update_image.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Product ID:</label>
            <input type="number" name="product_id" placeholder="Enter Product ID" required>
        </div>

        <div>
            <label>Upload New Image:</label>
            <input type="file" name="product_image" accept="image/*" required>
        </div>

        <button type="submit" name="submit">Update Image</button>
    </form>
</body>
</html>
