<!DOCTYPE html>
<html>
<head>
    <title>Incoming Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Blood Bank</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="blood_data.html">Add</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="requests.php">Requests</a>
            </li>
        </ul>
        <form class="form-inline ml-auto">
            <button class="btn btn-light" type="button">Logout</button>
        </form>
    </nav>

    <div class="container">
        <h2 class="mt-4 text-center">Incoming Requests</h2>

        <table class="table table-bordered">
        <thead class="thead-dark">
                <tr>
                    <th>Request ID</th>
                    <th>Blood ID</th>
                    <th>Hospital ID</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection
                require_once('db.php');

                // Fetch incoming requests from the "requests" table
                $sql = "SELECT rid, bid, sno, username FROM requests";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["rid"] . "</td>";
                        echo "<td>" . $row["bid"] . "</td>";
                        echo "<td>" . $row["sno"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No incoming requests.</td></tr>";
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
