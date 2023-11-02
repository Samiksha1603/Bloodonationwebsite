<?php
session_start();
require_once('db.php'); // Include the database connection

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT sno, username, password FROM users WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) { // Compare plain text passwords
            $_SESSION['user_id'] = $row['sno'];
            header("Location: welcome.php"); // Redirect to a welcome page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
