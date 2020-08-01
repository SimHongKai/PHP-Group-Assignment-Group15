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
			//check if user is login
			if (isset($_SESSION['username']) && $_SESSION['login'] == 'OK'){
                require("database.php");
                //find user id
				
					$username = $_SESSION['username'];
					$sql= "SELECT * from user WHERE user_name = '$username'";
					$user_id = mysqli_query($connect, $sql);
					$user_id = mysqli_fetch_row($user_id);
					$user_id = $user_id[0];
                
					$sql2= "SELECT * from purchase WHERE user_id = '$user_id'";
					$result = $connect->query($sql2);
                if($result->num_rows > 0) {
                    echo "<table id='table' border='1'>
                            <tr>
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
							<th>Bus</th>
							<th>Start</th>
							<th>Dest.</th>
							<th>Travel Date</th>
                            <th>No of Tickets</th>
                            <th>Total Price</th>
                            </tr>";
                        while($row = $result->fetch_assoc()) {
							//get the route information from the associated route_id
							$route_id = $row['route_id'];
							$sql3 = "SELECT * from route WHERE route_id = '$route_id'";
							$routeRow = $connect->query($sql3);
							$routeRow = mysqli_fetch_array($routeRow);
							//get bus name
							$bus_id = $routeRow['bus_id'];
							$query = "SELECT bus_name FROM bus WHERE bus_id = '$bus_id'";
							$busName = mysqli_query($connect, $query);//get the associated bus Name
							//fetch the string from sql object//
							$busName = mysqli_fetch_row($busName);
							$busName = $busName[0];
							
                            echo "<tr>";
                            echo "<td>".$row['purchase_id']."</td>";
                            echo "<td>".$row['purchase_date']."</td>";
							echo "<td>".$busName."</td>";
							echo "<td>".$routeRow['start']."</td>";
							echo "<td>".$routeRow['destination']."</td>";
							echo "<td>".$routeRow['date']."</td>";
                            echo "<td>".$row['no_of_tickets']."</td>";
                            echo "<td>RM".$row['purchase_total']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results. No Purchases Made.";
                    }
                $connect->close();
			}else{
				echo "<p>Please <a href='login.php'>Login</a> to see your purchase history.</p>";
			}
            ?>
        </center>
    </body>
</html>
