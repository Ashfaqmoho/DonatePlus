<?php
session_start();
if (!isset($_SESSION['admindashbord']) || !$_SESSION['admindashbord']) {
    header("Location: ../admin/admindashboard.php");
    exit();
}

$servername = "localhost"; 
$dbusername = "root";      
$dbpassword = "";      
$dbname = "donationdb";

// Create connection
$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: ". $connection->connect_error);
}

// Fetch data for the given ID
$id = $_GET['id'];

$sql = "SELECT * FROM Donation WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No record found with the given ID.");
}

$row = $result->fetch_assoc();

// Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $connection->real_escape_string($_POST['name']);
    $mail = $connection->real_escape_string($_POST['mail']);
    $phone = $connection->real_escape_string($_POST['phone']);
    $type = $connection->real_escape_string($_POST['type']);
    $quantity = $connection->real_escape_string($_POST['quantity']);
    $address = $connection->real_escape_string($_POST['address']);

    $sql = "UPDATE Donation SET name=?, mail=?, phone=?, type=?, quantity=?, address=? WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssisssi", $name, $mail, $phone, $type, $quantity, $address, $id);
    if ($stmt->execute()) {
        header("Location: admindashboard.php");
        exit();
    } else {
        echo "Error updating record: ". $connection->error;
    }
    $stmt->close();
}

$connection->close();
?>
