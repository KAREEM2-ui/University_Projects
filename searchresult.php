<?php
include "connect.php";

$errors=[];
if(empty($_POST['uid'])
	&&empty($_POST['fn'])
	&&empty($_POST['ln'])
	&&!isset($_POST['g'])
	&&empty($_POST['age']) 
	&&$_POST['gove']=='x'
	&&!isset($_POST['pid']))
	
	$errors[]="Enter atleast one input";
	
	if(sizeof($errors)==0)
{
	$q="select user_id,first_Name,last_name from subscriptions join profile using(user_id) where user_id>0";
	if(!empty($_POST['uid']))
	$q.=" and user_id=".$_POST['uid'];	
	if(!empty($_POST['fn']))
	$q.=" and first_Name like'%{$_POST['fn']}%'";	
	if(!empty($_POST['ln']))
	$q.=" and last_name like'%{$_POST['ln']}%'";
	if(isset($_POST['g']))
	$q.=" and Gender ='".$_POST['g']."'";
	if(!empty($_POST['age']))
	$q.=" and Age=".$_POST['age'];
	if($_POST['gove']!='x')
	$q.=" and Governorate="."'{$_POST['gove']}'";
	if(isset($_POST['pid']))
	$q.=" and Package_Id =".$_POST['pid']."";

	$r=mysqli_query($conn,$q) 
		or die("Error in $q");
	$par=mysqli_num_rows($r);
	if ($par > 0) 
	{
		echo "Your search result contains $par records";
		echo "<ol>";
		while($h=mysqli_fetch_assoc($r))
		{
			echo "<li>";
			echo $h['user_id']."-".$h['first_Name']." ".$h['last_name'];
			echo "</li>";
		}
		echo "</ol><BR><BR>";
		
	}
	else
		echo "No records found";
}
else
{
	display_errors($errors);
}
?>