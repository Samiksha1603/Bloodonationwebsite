<?php
$servername = "localhost";
$username = "root";
$password = "Samiksha1603";
$database = "users123";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
