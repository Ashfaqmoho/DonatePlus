<?php
// Replace with your database credentials
$servername = "localhost"; 
$dbusername = "root";      
$dbpassword = "";      
$dbname = "donationdb";

// Create connection
$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch donation list
$sql = "SELECT id, name, mail, phone, type, quantity, address FROM donation";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $donations = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $donations = [];
}



$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <h1>Admin Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?php echo htmlspecialchars($donation['name']); ?></td>
                    <td><?php echo htmlspecialchars($donation['mail']); ?></td>
                    <td><?php echo htmlspecialchars($donation['phone']); ?></td>
                    <td><?php echo htmlspecialchars($donation['type']); ?></td>
                    <td><?php echo htmlspecialchars($donation['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($donation['address']); ?></td>
                    <td class="actions">
                        
                        <!-- Delete Form -->
                        <form method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($donation['id']) ?>">
                            <button type="submit" class="delete">Delete</button>
                        </form>


                        <!-- Send Mail Form -->
                        <form method="post" action="send.php">
                            <input type="hidden" name="email" value="<?= htmlspecialchars($donation['mail']) ?>">
                            <button type="submit" class="mail">Send Mail</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.html">Logout</a>

    <?php

        if (isset($_GET['msg'])) {
            echo "<p style='text-align: center; color: green; font-weight: bold;'>" . htmlspecialchars($_GET['msg']) . "</p>";
        }
    ?>

</body>

</html>
