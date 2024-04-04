<?php
include "lib.php";
include "connect.php";

$errors = [];

//check wheather all fields Entered
if(empty($_POST['fname']))
	$errors[] = "Please write Your First Name";
if(empty($_POST['lname']))
	$errors[] = "Please write Your Last Name";
if(!isset($_POST['gen']))
	$errors[] = "Gender is Not Chosen";
if(empty($_POST['dateofbirth']))
	$errors[] = "Please Enter Your Date of Birth";
if(empty($_POST['mil']))
	$errors[] = "Please Enter Your Email";
if(empty($_POST['pas']))
	$errors[] = "Please Enter Your Password";
if(empty($_POST['ph']))
	$errors[] = "Please Enter Your Phone Number";
if($_POST['gov']=='0')
	$errors[] = "Please Select Your Governorate";

//check size and Data Entered

if(!empty($_POST['fname']) && !preg_match("/^[A-Za-z]{1,15}$/",$_POST['fname']))
		$errors[] = "First Name can contain only letters between 1 to 15";


if( !empty($_POST['lname']) && !preg_match("/^[A-Za-z-]{1,15}$/",$_POST['lname']))
		$errors[] = "First Name can contain only letters and hyphen between 1 to 15";

if( !empty($_POST['dateofbirth']) && $_POST['dateofbirth'] >= date("Y-m-d"))
		$errors[] = "Date of Birth Must be less than The current date";
	
if( !empty($_POST['mil']) && !preg_match("/^[A-Za-z0-9_.]+@(gmail|yahoo|outlook)\.com$/",$_POST['mil']))
		$errors[] = "The email can contain letters, numbers, underscores, and dots only, and has to be Yahoo, Gmail, or Outlook";
	
// check if The Email is Registered already in The Database

$qEmail = "Select Email from login";
$rEmail = mysqli_query($conn,$qEmail)
			or die("Error in $qEmail");
while($AllEmails = mysqli_fetch_assoc($rEmail))
{
	if($AllEmails['Email']==$_POST['mil'])
		$errors[] = "This Email is Already been Used";
}

if(!empty($_POST['pas']) && !preg_match("/^[A-Za-z-0-9!$&*#_-]{8,10}$/",$_POST['pas']))
		$errors[] = "Password Must Contain At least 8 characters includeing (letters,numbers,other characters like 
					!,$,&,#,_,-,*)";
if( !empty($_POST['ph']) && !preg_match("/^[0-9]{8}$/",$_POST['ph']))
		$errors[] = "Phone Number Must Contain 8 Numbers Only";















if(sizeof($errors)== 0)
{
	$q  = "insert into profile values (";
	$q .= "{$_POST['id']}  , "; 
	$q .="'{$_POST['fname']}' , ";
	$q .="'{$_POST['lname']}' , ";
	$q .="'{$_POST['gen']}' , ";
	$age = date("Y-m-d") - $_POST['dateofbirth'];
	$q .="$age,";
	$q .="'{$_POST['gov']}' , ";
	$q .="{$_POST['ph']}  , ";
	$q .=" 'Member' ) "; // The Type of Registered people is Member

	
	$r = mysqli_query($conn,$q)
		or die("Error in $q");
		
	// Encrypt the Password Using PHP hashing function
	$Password_hashed = password_hash($_POST['pas'], PASSWORD_DEFAULT);

	$qlogin = "insert into login values (";
	$qlogin .="'{$_POST['mil']}' , ";
	$qlogin .="'$Password_hashed' , ";
	$qlogin .= "{$_POST['id']}  ) ";
	
	$rlogin = mysqli_query($conn,$qlogin)
				or die("Error in $qlogin");


	echo "<hr>";
	echo "<h1 align=center> Successful Insertion </h1>"."<br>";
	echo "<h3 align=center><a href='Login.php' > Login Here  </a></h3>";
	echo "<hr>";
}


else
{
	display_errors($errors);
}	
?>