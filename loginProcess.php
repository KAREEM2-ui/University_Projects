<?php
include "connect.php";
$qlogin = "Select * from login where Email='{$_POST['mil']}' ";
$rlogin = mysqli_query($conn,$qlogin)
			or die("Error in $qlogin");
if(mysqli_num_rows($rlogin) > 0 )
{
	echo "Email is Valid"."<br>";
	$login = mysqli_fetch_assoc($rlogin);
	
	/* check The Password using PHP function to compare 
	the hashed password stored in the database and the entered password */
	if (password_verify($_POST['pas'], $login['Password'])) 
	{
		echo "Password is Valid"."<br>";
		echo "You login is Right";
		$email = $_POST['mil'];
		$user_id = $login['user_id'];
		
		session_start();
		
		$_SESSION['email'] = $email;
		$_SESSION['user_id'] = $user_id;
		header("Location:Main.php");
		exit();

	}
	else
	{
		echo "Password Is not Correct";
	}
}

else 
{
	echo "This Email is Not Found";
	
}



?>