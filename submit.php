<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password, if you haven't set any
$database = "survey_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$number = $conn->real_escape_string($_POST['number']);
$relationship = $conn->real_escape_string($_POST['relationship']);
$goodness = $conn->real_escape_string($_POST['goodness']);
$attributes = implode(',', $_POST['attributes']);
$reason = isset($_POST['reason']) ? $conn->real_escape_string($_POST['reason']) : '';

// Attempt insert query execution
$sql = "INSERT INTO survey_responses (name, email, number, relationship, goodness, attributes, reason) 
        VALUES ('$name', '$email', '$number', '$relationship', '$goodness', '$attributes', '$reason')";

if ($conn->query($sql) === true) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

// Close connection
$conn->close();
?>