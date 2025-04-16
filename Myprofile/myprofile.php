<?php
// Include static user data
require_once 'user_data_static.php';

// For demonstration, we'll fetch user with ID 1
// In a real application, this would come from the session or URL parameter
$userId = 1;
$userData = getUserData(null, $userId);

// Get user history data
$userHistory = getUserHistory(null, $userId);
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
      <li><a href="../Login/login.php">Login/SignUp</a></li>
      <li><a href="../Donation/donation.php">Donation</a></li>
      <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
      <li><a href="../Basket/basket.php">Basket</a></li>
    </ul>
  </nav>
  <div class="container">
    <header class="profile-header">
      <div class="profile-background"></div>
      <div class="profile-info-container">
        <div class="profile-picture">
          <div class="placeholder-image">
            <?php
            if ($userData) {
              echo strtoupper(substr($userData['name'], 0, 1));
              $nameParts = explode(' ', $userData['name']);
              if (count($nameParts) > 1) {
                echo strtoupper(substr($nameParts[count($nameParts) - 1], 0, 1));
              }
            } else {
              echo "U";
            }
            ?>
          </div>
        </div>
        <div class="profile-details">
          <h1><?php echo $userData ? htmlspecialchars($userData['name']) : 'User Not Found'; ?></h1>
          <span class="user-role">
            <?php echo $userData ? htmlspecialchars($userData['role']) : 'Unknown Role'; ?>
          </span>
        </div>
        <?php if ($userData): ?>
          <a href="editprofile.php" class="btn edit-profile-btn">Edit Profile</a>
        <?php endif; ?>
      </div>
    </header>

    <main>
      <?php if (!$userData): ?>
        <div class="error-message">
          <h2>User information could not be found</h2>
          <p>Please check the database connection or ensure the user exists.</p>
        </div>
      <?php else: ?>
        <section class="info-card">
          <h2>User Information</h2>
          <div class="info-grid">
            <div class="info-item">
              <span class="info-label">Name</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['name']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Email</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['email']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Date of Birth</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['dob']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Phone</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['phone']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Address</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['address']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Role</span>
              <span class="info-value"><?php echo htmlspecialchars($userData['role']); ?></span>
            </div>
          </div>
        </section>

        <section class="info-card">
          <h2>User History</h2>
          <div class="history-timeline">
            <?php if (empty($userHistory)): ?>
              <div class="empty-history">
                <p>No history records available for this user.</p>
              </div>
            <?php else: ?>
              <?php foreach ($userHistory as $history): ?>
                <div class="history-item">
                  <div class="history-date"><?php echo htmlspecialchars($history['year']); ?></div>
                  <div class="history-content">
                    <h3><?php echo htmlspecialchars($history['title']); ?></h3>
                    <p><?php echo htmlspecialchars($history['description']); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </section>
      <?php endif; ?>
    </main>

    <footer>
      <p>&copy; <?php echo date('Y'); ?> GreenBasket. All rights reserved.</p>
    </footer>
  </div>

  <script src="profile.js"></script>
</body>

</html>