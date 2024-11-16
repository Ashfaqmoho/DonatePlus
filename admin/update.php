<?php
session_start();
if (!isset($_SESSION['admindashbord']) || !$_SESSION['admindashbord']) {
    header("Location: ../admin/admindashboard.php");
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Donation";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
// Fetch data for the given name

$name = $_GET['name'];

$sql = "SELECT * FROM donations WHERE name = '$name'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("name", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No record found with the given name.");
}

$row = $result->fetch_assoc();

// Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $mail = $conn->real_escape_string($_POST['mail']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $type = $conn->real_escape_string($_POST['type']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $address = $conn->real_escape_string($_POST['address']);

    $sql = "UPDATE donations SET mail=?, phone=?, type=?, quantity=?, address=? WHERE name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $mail, $phone, $type, $quantity, $address, $name);
    if ($stmt->execute()) {
        header("Location: admindashboard.php");
        exit();
    } else {
        echo "Error updating record: ". $conn->error;
    }
    $stmt->close();
}
    $conn->close();
    ?>


