<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donationdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize input

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM donation WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Record deleted successfully, redirect to the admin dashboard
        header("Location: admindashboard.php"); // Redirect to the admin dashboard page
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
