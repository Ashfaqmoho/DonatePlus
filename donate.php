<?php
$servername = "localhost"; 
$dbusername = "root";      
$dbpassword = "";      
$dbname = "donationdb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$address = $_POST['address'];

// Use prepared statements to avoid SQL injection and handle special characters
$stmt = $conn->prepare("INSERT INTO donation (name, mail, phone, type, quantity, address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisis", $name, $mail, $phone, $type, $quantity, $address);

if ($stmt->execute()) {
    // If the record is added successfully, show a success message and stay on the same page
    echo "<script>alert('Record added successfully!'); window.location.href='index.html';</script>";
} else {
    // If there's an error, show an error message and stay on the same page
    echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.html';</script>";
}

// Close the connection
$stmt->close();
$conn->close();
?>
