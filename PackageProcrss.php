<?php

session_start();
include "connect.php";

if(isset($_SESSION['user_id'])) // To Ensure Security
{

//check if the Customer has an Active Subuscreption already
$qActivityChecking = "select * from subscriptions where user_id ={$_SESSION['user_id']} and  STATUS = 'Active'";
$rActivityChecking = mysqli_query($conn,$qActivityChecking)
							or die("Error in $qActivityChecking");
if(mysqli_num_rows($rActivityChecking) == 0 )
{
// Extract Data of The Choosen Package
$qPackageData = "select * from packages where Package_id = {$_GET['Package_id']}"; 
$rPackageData = mysqli_query($conn,$qPackageData)
					or die("Error in $qPackageData");
$PackageData = mysqli_fetch_assoc($rPackageData);					

// Save The Subscreption Details
	$qSubscriptionsInsert = "INSERT INTO subscriptions(user_id, Package_Id, Starting_Date, Ending_Date, Total_Price, STATUS) 
							VALUES (";
	$qSubscriptionsInsert .= "{$_SESSION['user_id']}, ";
	$qSubscriptionsInsert .="{$_GET['Package_id']} , ";
// Start Date and End Date
	$TodayDate = date('Y-m-d');
	$qSubscriptionsInsert .="'$TodayDate' , ";
	$NumberOfDays = $PackageData['Duration'];
	$EndDate = date('Y-m-d', strtotime("+{$NumberOfDays} days"));
	$qSubscriptionsInsert .= "'$EndDate' , ";
// Total Price 
	$Total = $PackageData['Price'] + ($PackageData['Price'] * (5/100));
	$qSubscriptionsInsert .= "$Total , ";
	$qSubscriptionsInsert .= "'Active'   ) ";


	
	
	
	$rSubscriptionsInsert = mysqli_query($conn,$qSubscriptionsInsert)
				or die("Error in $qSubscriptionsInsert");
				
	echo "<hr>";
	echo "<h1 align=center> Well Done ! Succeccful Subscreption</h1>"."<br>";
	echo "<h3 align=center><a href='Main.php' >Back To Home </a></h3>";
	echo "<hr>";
}


else 
	

{
	echo "<hr>";
	echo "<h1 align=center>You have an Active Subscription Already</h1>"."<br>";
	echo "<h3 align=center><a href='Main.php' >Back To Home </a></h3>";
	echo "<hr>";
	
}



}
?>