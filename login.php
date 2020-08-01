<!DOCTYPE html>
<html lang="en">

<head>
     <title>Log in</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<?php
include ("header.php");
include ("database.php");
if(isset($_POST['submitted'])){
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $search = $connect->query("SELECT * FROM user WHERE user_name='$username'");
    if($search->num_rows > 0){
      $password = $_POST['password'];
      $user = $search->fetch_assoc();
      if($password == $user['password']){
        $_SESSION['username'] = $user['user_name'];
        $_SESSION['login'] = 'OK';
        echo ("<script>
            window.alert('Login successful!');
            window.location.href='home.php';
            </script>");
      }else{
        echo '<script>alert("Wrong password. Please login again.");</script>';
      }
    }else{
      echo '<script>alert("Your username does not exist.");</script>';
    }
  }else {
    '<script>alert("Some forms may be empty. Please resubmit form.");</script>';
  }
}
?>
<form method="post" action="login.php">
<h1>Log In</h1>
<label for="username">Username:</label>
<input type="text" name="username" /><br/><br/>
<label for="password">Password:</label>
<input type="password" name="password"/><br/><br/>
<button type='submit'>Log In</button>
   <input type="hidden" name="submitted" value="submitted"/>
</form>
<p><h6>Haven't register? Proceed to <?php echo "<a href='registration.php' style='color:red'><i>Registration</i></a>"; ?></h6></p>
</center>
</body>
</html>
