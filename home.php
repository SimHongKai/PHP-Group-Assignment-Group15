<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include ('header.php');
        ?>
		<center>
		<h1>Welcome to MyBus</h1>
		<h2>Book your bus tickets for Penang here!</h2>
		<h2>Popular and Commonly selected Destinations</h2>
		</center>
		<div class="row">
			<div class="column">
			<?php
			if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
				echo "<a href = 'purDetails.php?id=6'>";
			}else{
				echo "<a href='login.php'>";
			}
			?>
			<img src="penanghill.jpg" class="gallery"/><br>
			<figcaption>Penang Hill</figcaption>
			</a>
			</div>
		
			<div class="column">
			<?php
			if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
				echo "<a href = 'purDetails.php?id=9'>";
			}else{
				echo "<a href='login.php'>";
			}
			?>
			
			<img src="thetop.jpg" class="gallery"/><br>
			<figcaption>The Top</figcaption>
			</a>
			</div>
			
			<div class="column">
			<?php
			if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
				echo "<a href = 'purDetails.php?id=6'>";
			}else{
				echo "<a href='login.php'>";
			}
			?>
			<a href = "purDetails.php?id=7">
			<img src="gurney.jpg" class="gallery"/><br>
			<figcaption>Gurney Plaza</figcaption>
			</a>
			</div>
		
			<div class="column">
			<?php
			if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
				echo "<a href = 'purDetails.php?id=8'>";
			}else{
				echo "<a href='login.php'>";
			}
			?>
			<img src="airport.jpg" class="gallery"/><br>
			<figcaption>Penang International Airport</figcaption>
			</a>
			</div>
		</div>
		
		<div class ="row">
			<center>
			<p>Here at MyBus, we strive to make large selections of bus booking easy and available to all. With an account, the entire process 
			of searching, choosing, and booking is but a few minutes and a couple clicks away.</p>
			<p>What are you waiting for?
			<button onclick="location.href = 'destList.php';" id="myButton" class="float-left submit-button" >Book Now</button></p>
			</center>
		</div>
    </body>
</html>