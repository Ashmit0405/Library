<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$genre = mysqli_real_escape_string($conn, $_POST['genre']);
$avail = mysqli_real_escape_string($conn, $_POST['status']);

$sql = "INSERT INTO Books (title, author, genre, status) VALUES ('$title', '$author', '$genre','$avail')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
    mysqli_close($conn);
    header("refresh:0;url=home.html");
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
?>
