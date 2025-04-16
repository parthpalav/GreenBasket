<?php
// Include static user data
require_once 'user_data_static.php';

// For demonstration, we'll edit user with ID 1
// In a real application, this would come from the session or URL parameter
$userId = 1;
$userData = getUserData(null, $userId);

$errors = [];
$success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    
    // Validate form data
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is invalid';
    }
    

    if (empty($errors)) {

        $success = true;
        $userData['name'] = $name;
        $userData['email'] = $email;
        $userData['phone'] = $phone;
        $userData['address'] = $address;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - GreenBasket</title>
    <link rel="stylesheet" href="editprofile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">
</head>
<body>
    
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
                                echo strtoupper(substr($nameParts[count($nameParts)-1], 0, 1));
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
            </div>
        </header>

        <main>
            <?php if (!$userData): ?>
                <div class="error-message">
                    <h2>User information could not be found</h2>
                    <p>Please check the database connection or ensure the user exists.</p>
                </div>
            <?php else: ?>
                <?php if ($success): ?>
                    <div class="info-card" style="background-color: #e8f5e9; border-left: 4px solid var(--primary-color);">
                        <p style="color: var(--primary-color); font-weight: 500;">Profile updated successfully! (Demo Mode: Changes won't be saved permanently)</p>
                    </div>
                <?php endif; ?>
                
                <section class="info-card">
                    <h2>Edit Profile</h2>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($userData['name']); ?>" required>
                            <?php if (isset($errors['name'])): ?>
                                <span style="color: #cc0000; font-size: 12px;"><?php echo $errors['name']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                            <?php if (isset($errors['email'])): ?>
                                <span style="color: #cc0000; font-size: 12px;"><?php echo $errors['email']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($userData['phone']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="3"><?php echo htmlspecialchars($userData['address']); ?></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <a href="index_static.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn">Save Changes</button>
                        </div>
                    </form>
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