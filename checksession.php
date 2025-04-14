checksession.php
<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user'])) {
    echo json_encode([
        'loggedIn' => true,
        'name' => $_SESSION['user']['name']
    ]);
} else {
    echo json_encode([
        'loggedIn' => false
    ]);
}
?>
where to fetch 


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In User</title>
</head>
<body>
    <div id="user-name"></div>

    <script>
        async function fetchUserName() {
            try {
                const response = await fetch('check_session.php');
                const data = await response.json();
                const userNameDiv = document.getElementById('user-name');
                if (data.loggedIn) {
                    userNameDiv.textContent = 'Welcome, ' + data.name;
                } else {
                    userNameDiv.textContent = 'You are not logged in.';
                }
            } catch (error) {
                console.error('Error fetching user info:', error);
            }
        }
        fetchUserName();
    </script>
</body>
</html>
