<link rel="stylesheet" href="style.css">
<?php
    session_start();
    if((isset($_SESSION['login']) && $_SESSION['login'] == 'OK')) {
        echo "<div class='header2'>";
        echo "<a href='logout.php' class='btn btn-primary'>Logout</a>";
        echo "<a>Welcome, ".$_SESSION['username']."</a>";
        echo "</div>";
    }else{
        echo "<div class='header2'>";
        echo "<a href='login.php'>Login</a>";
        echo "<a href='registration.php'>Sign Up</a>";
        echo "</div>";
    }
?>