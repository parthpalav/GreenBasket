<!-- <?php
        include 'connection.php';
        session_start();

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $email;
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid email or password!";
            }
        }
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
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
