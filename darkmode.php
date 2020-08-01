<style>
	<?php
	if (isset($_POST['darkMode'])){
		if(isset($_COOKIE['darkMode'])){//if there are cookies, flip them
			setcookie('darkMode', !$_COOKIE['darkMode'], time()+3600);//set one hour
			if (!$_COOKIE['darkMode']){//Cookies arent updated immediately so if originally cookie false, after click is true so use not.
				echo "body {";
				echo "background-color: rgb(58, 62, 73);";
				echo "color: white;";
				echo "}";
			}
		}else{
			setcookie('darkMode', true, time()+3600);//if no previous cookies, then it must be from light to dark.
			echo "body {";
			echo "background-color: rgb(58, 62, 73);";
			echo "color: white;";
			echo "}";
		}
	}else{//if no click on button and just normal load check cookeis
		if(isset($_COOKIE['darkMode'])){//if there are cookies
			if ($_COOKIE['darkMode']){
				echo "body {";
				echo "background-color: rgb(58, 62, 73);";
				echo "color: white;";
				echo "}";
			}
		}
	}
	?>
</style>