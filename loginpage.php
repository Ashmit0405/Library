<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile =mysqli_real_escape_string($conn, $_POST['mobile']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<b>Registration Failed!</b><br>";
        die("Invalid email format");
    }
    
    if (!preg_match('/^\d{10}$/', $mobile)) {
        echo "<b>Registration Failed!</b><br>";
        die("Invalid mobile number format. Mobile number should contain exactly 10 digits.");
    }
    
    $sql = "INSERT INTO Users_data (email, name, mobile, room, description)
    VALUES ('$email', '$name', '$mobile', '$room', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: home.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
