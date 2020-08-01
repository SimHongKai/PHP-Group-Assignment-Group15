<html>
    <head>
        <title>Purchase Details</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include ('header.php');
        ?>
        <center>
        <h1>Purchase Details</h1>
        <?php
            require("database.php");
            $id = $_GET['id'];
            $sql= "SELECT * from route WHERE route_id='$id'";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
				
				$id = $row['bus_id'];
				$query = "SELECT bus_name FROM bus WHERE bus_id = '$id'";
				$busName = mysqli_query($connect, $query);//get the associated bus Name
				//fetch the string from sql object//
				$busName = mysqli_fetch_row($busName);
				$busName = $busName[0];
				
                echo "You would like to purchase tickets to this route: ";
                echo "<table border='1px'>
                <tr><td>Route ID: </td>
                <td>".$row['route_id']."</td></tr>
                <tr><td>Starting Location: </td>
                <td>".$row['start']."</td></tr>
                <tr><td>Destination: </td>
                <td>".$row['destination']."</td></tr>
                <tr><td>Date: </td>
                <td>".$row['date']."</td></tr>
                <tr><td>Price: </td>
                <td>".$row['price']."</td></tr>
                <tr><td>Bus Name: </td>
                <td>".$busName."</td></tr>";
                echo "</table>";
            }
            $connect->close();
        ?>
        <?php
            require ("database.php");
            $id = $_GET['id'];
            if(isset($_POST['submitted'])){
                if(isset($_POST['no_of_tickets'])){
                    $username = $_SESSION['username'];
					date_default_timezone_set("Asia/Kuala_Lumpur");
                    $purchase_date = date('Y-m-d H:i:s');
                    $no_of_tickets = $_POST['no_of_tickets'];

                    //Find route ID and price
                    $sql= "SELECT route_id from route WHERE route_id='$id'";
                    $route_id = mysqli_query($connect, $sql);
                    $route_id = mysqli_fetch_row($route_id);
                    $route_id = $route_id[0];

                    $sql2= "SELECT price from route WHERE route_id='$id'";
                    $price = mysqli_query($connect, $sql2);
                    $price = mysqli_fetch_row($price);
                    $price = $price[0];

                    $totalprice = $no_of_tickets * $price;

                    //Find User ID
                    $sql3= "SELECT * from user WHERE user_name = '$username'";
                    $user_id = mysqli_query($connect, $sql3);
                    $user_id = mysqli_fetch_row($user_id);
                    $user_id = $user_id[0];

                    //echo "$purchase_date, $no_of_tickets, $route_id, $user_id";
                    $sql4 = "INSERT INTO purchase(purchase_date, no_of_tickets, purchase_total, user_id, route_id) VALUES('$purchase_date','$no_of_tickets', '$totalprice','$user_id','$route_id')";
                    if($connect->query($sql4)){
                        echo ("<script>
                            window.alert('Purchase successful!');
                            window.location.href='purHistory.php';
                            </script>");
                    }else{
                        echo '<script>alert("Purchase failed.");</script>';
                    }
                }
            }
        ?>
        <p>Please select the number of tickets you would like: (Max 5)</p>
        <form action='' method='POST'>
        <select name ='no_of_tickets' id='no_of_tickets'>
            <option value=''>No. of Tickets</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
        </select>
        <br><br><input type='submit' value='Purchase'>
        <input type="hidden" name="submitted" value="submitted"/>
        </form>
        </center>
    </body>
</html>
