<!-- <?php
include 'connection.php';
session_start();

if (isset($_POST['signup'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (name, email, password, dob, phone, address, role)
              VALUES ('$name', '$email', '$password', '$dob', '$phone', '$address', '$role')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Error creating account!";
    }
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>
        <form action="" method="POST">
            <div class="input-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" required>
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
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required>
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
                    <option value="Customer">Customer</option>
                    <option value="Farmer">Farmer</option>
                    <option value="Donor">Donor</option>
                </select>
            </div>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
</body>
</html>