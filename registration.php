<!DOCTYPE html>
<html lang="en">

<head>
     <title>Registration</title>
     <link rel="stylesheet" href="style.css">
</head>

<body>
  <center>
  <?php
  include ("header.php");
  include ("database.php");
	
  if(isset($_POST['submitted'])){
		
    if(isset($_POST ['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirm_password'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm_password'];
		$valid = true;
		
		//check if username follows standard conventions
		if ((!preg_match('/^[a-zA-Z0-9 ]*$/',$username)) || empty($username) ){
			$valid = FALSE;
			echo '<script>alert("Username should contains alphabets, white spaces, and numbers only.");</script>';
		}
		//check if username already taken
		$search = $connect->query("SELECT * FROM user WHERE user_name='$username'");
		if($search->num_rows > 0){
			$valid = FALSE;
			echo '<script>window.alert("Username already used.");</script>';
		}
        
		//check email format
		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$valid = FALSE;
			echo '<script>window.alert("Invalid Email format entered.");</script>';
		}
		//check if email already registered//
        $search = $connect->query("SELECT * FROM user WHERE user_email='$email'");
        if($search->num_rows > 0){
			$valid = FALSE;
			echo '<script>window.alert("Email already used.");</script>';
        }
          
		//check if password is secure (uppercase, lowercase, number, and length of 10-20(database max))
		if(!(preg_match('@[A-Z]@', $password) && preg_match('@[a-z]@', $password) && preg_match('@[0-9]@', $password) && (strlen($password) >= 10)
			&& (strlen($password) <= 20))){
			$valid = FALSE;
			echo '<script>window.alert("Password is not secure(Needs to contain Upper and Lowercase, Numbers and between 10 and 20 characters).");</script>';
		}		
		
        if ($password != $confirm) {
			$valid = FALSE;
            echo '<script>window.alert("Password does not match.");</script>';
        }
		
		//if no invalid inputs proceed with registration process//
		if($valid){
			$sql = "INSERT INTO user(user_name, user_email, password) VALUES('$username','$email','$password')";
			
			if($connect->query($sql)){
				echo ("<script>
					window.alert('Your forms are inputted properly. Proceeding...');
					window.location.href='home.php';
					</script>");
			}else{
				echo '<script>window.alert("Registration failed. Please resubmit form.");</script>';
			}
		}
    }
  }
  
  ?>
<form method="post" action="registration.php">
  <h1>Registration Form</h1>
  <p>Please enter particular details in the forms below.</p>
<label for="Username">Username: </label>
<input type="text" name="username" maxsize="20" placeholder="Maximum 20 characters" required><br/><br/>
<label for="email">E-mail: </label>
<input type="text" name="email" maxsize="40" placeholder="Insert e-mail here" required><br/><br/>
<label for="password">Password: </label>
<input type="password" name="password" maxsize="20" placeholder="Min 10 Max 20 characters" required><br/><br/>
<label for="confirm_password">Confirm password: </label>
<input type="password" name="confirm_password" maxsize='15' placeholder="Confirm your password" required><br/><br/>
<p><input type="submit" name="submit" value="Submit"/>
   <input type="reset" name="reset" value="Reset"/>
   <input type="hidden" name="submitted" value="true"/></p>
</form>
<p><h6>Already registered? Proceed to <?php echo "<a href='login.php' style='color:red'><i>Log in</i></a>"; ?></h6></p>
</center>
</body>
</html>
