<div class='header'>
  <img src="buslogo.png" class="headerimg">
  <?php
    if (basename($_SERVER['PHP_SELF']) == 'home.php') {
      echo "<a href='home.php' class='active'>Home</a>";
    }
    else {
      echo "<a href='home.php'>Home</a>";
    }
    if (basename($_SERVER['PHP_SELF']) == 'busList.php') {
      echo "<a href='busList.php' class='active'>Bus List</a>";
    }
    else {
      echo "<a href='busList.php'>Bus List</a>";
    }
    if (basename($_SERVER['PHP_SELF']) == 'destList.php') {
      echo "<a href='destList.php' class='active'>Destination List</a>";
    }
    else {
      echo "<a href='destList.php'>Destination List</a>";
    }
    if (basename($_SERVER['PHP_SELF']) == 'purHistory.php') {
      echo "<a href='purHistory.php' class='active'>Purchase History</a>";
    }
    else {
      echo "<a href='purHistory.php'>Purchase History</a>";
    }
  ?>
  <?php
    require 'logincheck.php';
  ?>
  <div class="header2">
  <?php
    require 'darkmode.php';
	  echo "<form method = 'post'>";
	  echo "<input type = 'hidden' name = 'darkMode' value = 'true'/>";
    echo "<button type='submit' class >Toggle Dark Mode</button>";
	  echo "</form>";
  ?>
</div>
</div>