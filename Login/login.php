<?php
include '../connect.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Users WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Using cookie to create a 1 day session
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            setcookie("user_email", $email, time() + (24 * 60 * 60), "/");
            header("Location: ../Index/index.php");
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
    <link rel="stylesheet" href="background.css">
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
        
    <div class="form-container">
        <h2>Login</h2>
        <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>
        <form action="" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>

        <p style="margin-top: 20px; text-align: center;">
            <a style="text-decoration:none; color:black;" href="../SignUp/signup.php">Sign Up!</a>
        </p>
    </div>
</body>
</html>
