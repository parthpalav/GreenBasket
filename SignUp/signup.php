<?php
include '../connect.php';
session_start();

if (isset($_POST['signup'])) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No hashing
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = strtolower($_POST['role']);

    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        try {
            $query = "INSERT INTO Users (first_name, last_name, email, password, dob, phone, address, role)
                      VALUES (:first_name, :last_name, :email, :password, :dob, :phone, :address, :role)";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password); // Storing plain password
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $conn->lastInsertId();
                setcookie("user_email", $email, time() + (24 * 60 * 60), "/");
                header("Location: ../Index/index.php");
                exit();
            } else {
                $error_message = "Signup failed. Please try again.";
            }
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup_style.css">
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
        <h2>Sign Up</h2>
        <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>
        <form action="" method="POST" onsubmit="return validateForm();">
            <div class="input-group">
                <label for="name">First Name:</label>
                <input type="text" name="fname" required>
            </div>
            <div class="input-group">
                <label for="name">Last Name:</label>
                <input type="text" name="lname" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>
            </div>
            <div class="input-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required min="1910-01-01">
            </div>
            <div class="input-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" required>
            </div>
            <div class="input-group">
                <label for="address">Address:</label>
                <textarea name="address" rows="3" required></textarea>
            </div>
            <div class="input-group">
                <label for="role">Select Role:</label>
                <select name="role" required>
                    <option value="customer">Customer</option>
                    <option value="farmer">Seller</option>
                </select>
            </div>
            <div class = "input-group">
                <label for = "profile_picture"> Upload Profile Picture: </label>
                <input type = "file" name = "profile_picture" accept = "image/*" required>
            </div>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
</body>

<script>
    function validateForm() {
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

</html>
