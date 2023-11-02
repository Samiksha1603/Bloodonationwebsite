<?php
require_once('db.php'); // Include the database connection
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password']; // Plain text password

            $sql = "INSERT INTO hospitals (username, password) VALUES (?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                echo "<p class='alert alert-success text-center'>Registration successful.</p>";
                echo "<p class='text-center'><a href='login_hospital.html' class='btn btn-primary'>Login as Hospital</a></p>";

                // Redirect to login hospital page after 2 seconds
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'login_hospital.html';
                        }, 2000);
                      </script>";
            } else {
                echo "<p class='alert alert-danger text-center'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
