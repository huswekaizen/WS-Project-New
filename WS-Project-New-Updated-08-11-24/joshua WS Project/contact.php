<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Output the request method for debugging
echo 'Request Method: ' . $_SERVER['REQUEST_METHOD']; // This will help confirm the method

// Allow cross-origin requests (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// If it's a preflight OPTIONS request, we respond with a 200 OK
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Ensure the data is valid
    if ($name && $email && $phone && $message) {
        // Prepare the SQL query to insert data
        $sql = "INSERT INTO client_tbl (Name, Email, Phone, Message) VALUES ('$name', '$email', '$phone', '$message')";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: All fields are required!";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
