<?php
session_start(); // Start or resume the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a login page or any other desired destination
header("Location: login_hospital.html"); // Change "login.php" to the page you want to redirect to
exit();
?>
