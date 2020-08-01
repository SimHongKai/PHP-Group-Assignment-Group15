<html>
    <head>
        <title>Bus List</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <center>
        <?php
            include ('header.php');
        ?>
        <h1>Bus List</h1>
        <?php
            require("database.php");
            $sql= "SELECT * FROM bus ";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                echo "<table id='table' border='1'>
                        <tr>
                        <th>Bus ID</th>
                        <th>Bus Name</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['bus_id']."</td>";
                        echo "<td>".$row['bus_name']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    } else {
                        echo "0 results";
                    }
            mysqli_close($connect);
        ?>
        </center>
    </body>
</html>