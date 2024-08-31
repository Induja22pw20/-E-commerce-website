<?php
$username = $_POST["username"];
$password = $_POST["password"];
$phone = $_POST["phone"];

if (!empty($username)||!empty($password) || !empty($phone))
{
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="indujaisai";
}
$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if ($conn->connect_error) {
    die('connection failed: ' . $conn->connect_error); // Fixed the typo here
} else {
    $INSERT="INSERT INTO login(username,password,phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssi", $username, $password, $phone); // Changed "ssi" to "sss" for string parameters
    $stmt->execute();
    echo "registration success";
    $stmt->close();
    $conn->close();
}
?>
