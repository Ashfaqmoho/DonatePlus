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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    $name= $conn->real_escape_string($_POST['name']);
    
    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete from attendance table
        $delete_Donation_query = "DELETE FROM Donation WHERE name = ?";
        $stmt = $conn->prepare($delete_attendance_query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->close();
        
        // Delete from student table
        $delete_Donation_query = "DELETE FROM Donation WHERE name = ?";
        $stmt = $conn->prepare($delete_donation_query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->close();
        
        // Commit the transaction
        $conn->commit();
        
        
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        $conn->rollback();
        die("Failed to delete Donation: " . $e->getMessage());
    }
}

$conn->close();
?>
