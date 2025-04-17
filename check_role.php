<?php
session_start();

// Display the current session role
if (isset($_SESSION['role'])) {
    echo "Current Role: " . htmlspecialchars($_SESSION['role']);
} else {
    echo "No role is set in the session.";
}
?>
