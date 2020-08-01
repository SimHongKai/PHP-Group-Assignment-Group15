<html>
    <head>
        <title>Destination List</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include ('header.php');
        ?>
        <center>
        <h1>Destination List</h1>
		<p>| <a href="destList.php">Sort By Date</a> | <a href="destList.php?sort=1">Sort By Destination</a> | 
		<a href="destList.php?sort=2">Sort By Start</a> | <a href="destList.php?sort=3">Sort By Bus</a> |</p>	
        <?php
            require("database.php");
            $sql= "SELECT * from route";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                $query = mysqli_query($connect, "SELECT * from route");
		
		        //store the array of data in an array of arrays
		        while ($row = mysqli_fetch_array($query)) {
			        $rows[] = $row;
		        }
				//define the function for usort to sort the routes//
				if(isset($_GET['sort'])){
					$sort = $_GET['sort'];
					if ($sort == 1){
						//function for usort by Destination//
						function sort_routes($route1, $route2){
							return strcmp($route1['destination'], $route2['destination']);
						}
					}else if($sort == 2){
						//function for usort by Start//
						function sort_routes($route1, $route2){
							return strcmp($route1['start'], $route2['start']);
						}
					}else if($sort == 3){
						//function for usort by busID//
						function sort_routes($route1, $route2){
							return strcmp($route1['bus_id'], $route2['bus_id']);
						}
					}
				}else{//default is sort by date
					//function for usort by date
					function sort_routes($route1, $route2){
						$t1 = strtotime($route1['date']);
						$t2 = strtotime($route2['date']);
						return $t1 - $t2;
					}
				}
		
		        //sort the array using usort, and the defined function above.
		        usort($rows, 'sort_routes');
		
				echo "<table border = '1' id='table'>";
				echo "	<tr>
						<th>Bus Name</th>
						<th>Start</th>
						<th>Destination</th>
						<th>Date</th>
                        <th>Price</th>
                        <th>Order</th>
						</tr>";
				//display the rows of routes
				foreach ($rows as $row){
					$id = $row['bus_id'];
					$query = "SELECT bus_name FROM bus WHERE bus_id = '$id'";
					$busName = mysqli_query($connect, $query);//get the associated bus Name
					//fetch the string from sql object//
					$busName = mysqli_fetch_row($busName);
					$busName = $busName[0];
					//or else cannot display as string//
					echo "<tr>";
					echo "<td>".$busName."</td>";
					echo "<td>".$row['start']."</td>";
					echo "<td>".$row['destination']."</td>";
					echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['price']."</td>";
                    if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
                        echo "<td><a href='purDetails.php?id=".$row['route_id']."'?>Order</a></td>";
                    }else{
                        echo "<td><a href='login.php'>Order</a></td>";
                    }
					echo "</tr>";
				}
                echo "</table>";
            }else {
                echo "0 results";
            }
                /*echo "<table border='1px'>
                        <tr>
                        <th>Route ID</th>
                        <th>Start</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Bus ID</th>
                        <th>Order Link</th>
                        </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['route_id']."</td>";
                        echo "<td>".$row['start']."</td>";
                        echo "<td>".$row['destination']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['bus_id']."</td>";
                        if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
                            echo "<td><a href='purDetails.php?id=".$row['route_id']."'?>Order</a></td>";
                        }else{
                            echo "<td><a href='login.php'>Order</a></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }*/
            $connect->close();
        ?>
        </center>
    </body>
</html>
