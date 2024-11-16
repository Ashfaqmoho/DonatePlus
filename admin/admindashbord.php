<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        $connection = new mysqli($servername,$username.$password,$dbname);
        
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
                <a class='btn-primary btn-sm' href="update">update</a> |
                <a class='btn-primary btn-sm' href="Delete">Delete</a>
            </td>
            echo "</tr>";
            
        }

        
        ?>
 </tbody>
    </table>

</body>
</html>