<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ratings = $_POST["rating"];
    $description = $_POST["description"];

    // Validate and sanitize data if necessary

    // Create a database connection
    $conn = new mysqli('localhost', 'root', '', 'indujaisai');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert data into the feedback table
    $stmt = $conn->prepare("INSERT INTO feedback (rating, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $rating, $description);

    // Loop through the ratings array and insert each rating into the database
    foreach ($ratings as $rating) {
        if ($stmt->execute()) {
            // Feedback data inserted successfully
            echo "Feedback submitted successfully.";
        } else {
            // Error occurred while inserting feedback
            echo "Error submitting feedback: " . $stmt->error;
        }
    }

    // Close the database connection and the prepared statement
    $stmt->close();
    $conn->close();
} else {
    // If the form was not submitted via POST, you can handle the error here.
    echo "Error: Form not submitted.";
}
?>
