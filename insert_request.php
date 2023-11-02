<?php
// Include the database connection
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Request Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_POST['bid']) && isset($_POST['sno']) && isset($_POST['username'])) {
            $bid = $_POST['bid'];
            $sno = $_POST['sno'];
            $username = $_POST['username'];

            // Insert the request into the "requests" table
            $sql = "INSERT INTO requests (bid, sno, username) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $bid, $sno, $username);

            if ($stmt->execute()) {
                echo "<p class='alert alert-success text-center'>Request sent successfully.</p>";
                echo "<p class='text-center'><a href='welcome.php' class='btn btn-primary'>Back</a></p>";
            } else {
                echo "<p class='alert alert-danger text-center'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            // Handle cases where the form data is incomplete
            echo "<p class='alert alert-danger text-center'>Incomplete request data.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
