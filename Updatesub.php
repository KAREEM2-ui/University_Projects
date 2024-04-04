<?php
include "lib.php";
include "connect.php";
session_start();
$errors = [];

//check wheather all fields Entered
if(empty($_POST['fn']))
	$errors[] = "Please write Your First Name";
if(empty($_POST['ln']))
	$errors[] = "Please write Your Last Name";
if(empty($_POST['phone']))
	$errors[] = "Please Enter Your Phone Number";
if($_POST['gov']=='0')
	$errors[] = "Please Select Your Governorate";
//check size and Data Entered
if(!empty($_POST['fn']) && !preg_match("/^[A-Za-z]{1,15}$/",$_POST['fn']))
		$errors[] = "First Name can contain only letters between 1 to 15";

if( !empty($_POST['ln']) && !preg_match("/^[A-Za-z-]{1,15}$/",$_POST['ln']))
		$errors[] = "First Name can contain only letters and hyphen between 1 to 15";
if( !empty($_POST['phone']) && !preg_match("/^[0-9]{8}$/",$_POST['phone']))
		$errors[] = "Phone Number Must Contain 8 Numbers Only";
	
	
if(sizeof($errors)== 0)	

{
	$q = "UPDATE profile SET ";
    $q .= "first_Name='{$_POST['fn']}', ";
    $q .= "last_name='{$_POST['ln']}', ";
    $q .= "Governorate='{$_POST['gov']}', ";
    $q .= "phone_Number='{$_POST['phone']}' ";
    $q .= "WHERE user_id = {$_SESSION['user_id']}";
	$r = mysqli_query($conn,$q)
		or die("Error in $q");
	
	

//Build query for update profile table

$qupdate = "UPDATE profile SET first_Name='{$_POST['fn']}', last_name='{$_POST['ln']}', Governorate='{$_POST['gov']}', phone_Number='{$_POST['phone']}' WHERE user_id = {$_SESSION['user_id']}";
							 
$rupdate = mysqli_query($conn,$qupdate)
			or die("Error in $qupdate");

	echo "<hr>";
	echo "<h1 align=center> Successful to Update Details </h1>"."<br>";
	echo "<h3 align=center><a href='Account.php' > Back to Account  </a></h3>";
	echo "<hr>";
}


else
{
	display_errors($errors);
}	



?>