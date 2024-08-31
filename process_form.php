<?php
$product_id = $_POST["product_id"];
$customer_name = $_POST["customer_name"];
$email = $_POST["email"];
$door_no = $_POST["door_no"];
$city = $_POST["city"];
$pincode = $_POST["pincode"];

$conn = new mysqli('localhost', 'root', '', 'indujaisai');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO buy(product_id, customer_name, email, door_no, city, pincode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issisi", $product_id, $customer_name, $email, $door_no, $city, $pincode);
    if ($stmt->execute()) {
        echo "Order submitted successfully";
    } else {
        echo "Error submitting order: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
