<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("../img/pngtree-sophisticated-white-texture-background-with-ample-space-for-text-image_13925872.png") no-repeat;
         }
        table {
            width: 100%;
            border-collapse: collapse;
            animation: slideIn 1s ease-in;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        td:hover {
            background-color: #ddd;
        }
        h1 {
            text-align: center;
        }
        body {
            margin-top: 100px;
        }
        a {
            color: black;
            text-decoration: none;
        }
        a:hover {
            color: blue;
        }
        .delete-btn {
    background-color: #cf3311; /* Red color */
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.delete-btn:hover {
    background-color: #cf3311;
}
.update-btn {
    background-color: #cf3311; /* Red color */
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.update-btn:hover {
    background-color: #c82333;
}
    </style>


        
</head>
<body style = "margin: 50px;">
    <h1>Details of Donation</h1>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>name</th>
            <th>mail</th>
            <th>phone</th>
            <th>type</th>
            <th>quantity</th>
            <th>address</th>
           
        </tr>
    </thead>
<tbody>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Donation";

        
        // Create connection
        $connection = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: ". $connection->connect_error);
        }
        
        // read all row from batabase table
        $sql = "SELECT * FROM donations";
        $result = $connection->query($sql);

        if(!$result) {
            die("Inavalid query:" . $connection->error);
        }
        
        // read data of each row
        while ($row = $result -> fetch_assoc()){
            echo "<tr>";
            echo "<td>". $row["name"]. "</td>";
            echo "<td>". $row["mail"]. "</td>";
            echo "<td>". $row["phone"]. "</td>";
            echo "<td>". $row["type"]. "</td>";
            echo "<td>". $row["quantity"]. "</td>";
            echo "<td>". $row["address"]. "</td>";
            echo <td>
                <a class='btn-primary btn-sm' href='update.php?id=" . $row['id'] . "'>Update</a> |
                <a class='btn-primary btn-sm' href='delete.php?id=" . $row['id'] . "'>Delete</a>
            </td>
            echo "</tr>";
            
        }

        
        ?>
 </tbody>
    </table>

</body>
</html>