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

        <p style="margin-top: 20px; text-align: center;">New here? Sign Up!</p>
        <div style="text-align: center;">
            <a href="../SignUp/signup.php">
                <button type="button">Sign Up</button>
            </a>
        </div>
    </div>
</body>
</html>