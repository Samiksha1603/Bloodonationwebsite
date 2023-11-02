<?php
session_start(); // Start or resume the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login_user.html"); // Change "login.php" to the actual login page
exit();
?>
