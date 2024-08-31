<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$course = $_POST['course'];
$book = $_POST['book']; // corrected field name
$country = $_POST['country'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO form_submissions (fullname, phone, email, course, book, country, message) 
        VALUES ('$fullname', '$phone', '$email', '$course', '$book', '$country', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for getting in touch! We will be getting back to you shortly. While we do our best to reach you quickly, it may take about 24 hours to receive a response from us during peak hours. Thanks in advance for your patience. Have a great day!";
    // Redirect to home page after 3 seconds
    header("refresh:3; url=home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
