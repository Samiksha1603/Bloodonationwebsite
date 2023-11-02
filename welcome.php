<!DOCTYPE html>
<html>
<head>
    <title>Blood Data Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Blood Bank</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <button class="btn btn-light" type="button"><a href="logout_user.php">Logout</a></button>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <center><h2 >Blood Data</h2></center>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Blood ID</th>
                    <th>Hospital ID</th>
                    <th>Blood Type</th>
                    <th>Quantity</th>
                    <th>Hospital Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection
                require_once('db.php');

                // Fetch data from both tables using a JOIN operation
                $sql = "SELECT bd.bid, bd.sno, bd.blood_type, bd.quantity, h.username AS hospital_username
                        FROM blood_data bd
                        JOIN hospitals h ON bd.sno = h.sno";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["bid"] . "</td>";
                        echo "<td>" . $row["sno"] . "</td>";
                        echo "<td>" . $row["blood_type"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["hospital_username"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action='insert_request.php'>";
                        echo "<input type='hidden' name='bid' value='" . $row["bid"] . "'>";
                        echo "<input type='hidden' name='sno' value='" . $row["sno"] . "'>";
                        echo "<input type='hidden' name='username' value='" . $row["hospital_username"] . "'>";
                        echo "<button type='submit' class='btn btn-primary'>Request</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No blood data available.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
