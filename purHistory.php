<html>
    <head>
        <title>Purchase History</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include ('header.php');
        ?>
        <center>
            <h1>Purchase History</h1>
            <?php
                require("database.php");
                $sql= "SELECT * from purchase";
                $result = $connect->query($sql);
                if($result->num_rows > 0) {
                    echo "<table id='table' border='1'>
                            <tr>
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
                            <th>No. of Tickets</th>
                            <th>Total Price</th>
                            <th>User ID</th>
                            <th>Route ID</th>
                            </tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['purchase_id']."</td>";
                            echo "<td>".$row['purchase_date']."</td>";
                            echo "<td>".$row['no_of_tickets']."</td>";
                            echo "<td>RM".$row['purchase_total']."</td>";
                            echo "<td>".$row['user_id']."</td>";
                            echo "<td>".$row['route_id']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                $connect->close();
            ?>
        </center>
    </body>
</html>
