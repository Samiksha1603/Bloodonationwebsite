<?php
session_start();
require_once('db.php'); // Include the database connection

if (isset($_SESSION['user_id']) && isset($_POST['blood_type']) && isset($_POST['quantity'])) {
    $sno = $_SESSION['user_id'];  // Replaced "hospital_id" with "sno"
    $blood_type = $_POST['blood_type'];
    $quantity = $_POST['quantity'];

    // Insert the blood data into the blood_data table, associating it with the hospital
    $sql = "INSERT INTO blood_data (sno, blood_type, quantity) VALUES (?, ?, ?)";  // Replaced "hospital_id" with "sno"

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $sno, $blood_type, $quantity);  // Replaced "hospital_id" with "sno"

    if ($stmt->execute()) {
        echo "Blood data added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle cases where the user is not logged in or form data is missing
    echo "Hospital not authenticated or form data is incomplete.";
}
?>
