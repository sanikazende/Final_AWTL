<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "your_username"; // Replace with your actual database username
    $password = "your_password"; // Replace with your actual database password
    $dbname = "complaints";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the INSERT statement
    $sql = "INSERT INTO complaints (complaint_text) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $complaint);

    // Get complaint data from POST
    $complaint = $_POST['complaint'];

    // Validate complaint data (e.g., length, format) if necessary

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Complaint submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}

?>
