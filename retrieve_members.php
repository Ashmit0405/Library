<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <style>
        body{
            background-color: bisque;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: aliceblue; 
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Our Beloved Members!!</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Library";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT DISTINCT email, Name, Mobile, Room, Description FROM Users_data";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Email</th><th>Name</th><th>Mobile</th><th>Room</th><th>Description</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Mobile"] . "</td>";
            echo "<td>" . $row["Room"] . "</td>";
            echo "<td>" . $row["Description"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>
</body>
</html>
