<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

require_once '../connect.php';

$userId = $_SESSION['user_id'];

$query = "SELECT * FROM Users WHERE user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
    $userName = 'User Not Found';
    $userRole = 'Unknown Role';
    $userEmail = 'Unknown Email';
    $userDOB = 'Unknown Date';
    $userPhone = 'Unknown Phone';
    $userAddress = 'Unknown Address';
    $profilePicture = '';
} else {
    $userName = htmlspecialchars($userData['first_name'] . ' ' . $userData['last_name']);
    $userRole = htmlspecialchars($userData['role']);
    $userEmail = htmlspecialchars($userData['email']);
    $userDOB = htmlspecialchars($userData['dob']);
    $userPhone = htmlspecialchars($userData['phone']);
    $userAddress = htmlspecialchars($userData['address']);
    $profilePicture = !empty($userData['profile_pic']) ? '../uploads/profile_pics/' . htmlspecialchars($userData['profile_pic']) : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - GreenBasket</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">
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
            <li><a href="../Minimarket/minimarket.php">Marketplace</a></li>
        </ul>
    </nav>

    <div class="container">
        <header class="profile-header">
            <div class="profile-background"></div>
            <div class="profile-info-container">
                <div class="profile-picture">
                    <?php if ($profilePicture): ?>
                        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
                    <?php else: ?>
                        <div class="placeholder-image">
                            <?php echo strtoupper(substr($userName, 0, 1)); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="profile-details">
                    <h1><?php echo $userName; ?></h1>
                    <span class="user-role"><?php echo $userRole; ?></span>
                </div>
                
            </div>
        </header>

        <main>
            <section class="info-card">
                <h2>User Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Name</span>
                        <span class="info-value"><?php echo $userName; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo $userEmail; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date of Birth</span>
                        <span class="info-value"><?php echo $userDOB; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone</span>
                        <span class="info-value"><?php echo $userPhone; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Address</span>
                        <span class="info-value"><?php echo $userAddress; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Role</span>
                        <span class="info-value"><?php echo $userRole; ?></span>
                    </div>
                </div>
            </section>

            <section class="history-card">
                    
            </section>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> GreenBasket. All rights reserved.</p>
        </footer>
    </div>

    <script src="profile.js"></script>
</body>
</html>
