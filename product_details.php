<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    // Connect to your MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "indujaisai";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pro_det";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Description</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><h1>" . $row['name'] . "</h1></td>";
            echo "<td><p>Price: ₹" . $row['price'] . "</p></td>";
            echo "<td><p>Quantity: " . $row['quantity'] . "</p></td>";
            echo "<td><p>Description: " . $row['description'] . "</p></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Product not found.";
    }

    $conn->close();
    ?>
</body>
</html>
