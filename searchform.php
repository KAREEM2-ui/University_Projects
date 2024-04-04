<?php
include "connect.php";
session_start();
if(isset($_SESSION['user_id'])) // To Ensure Security
{
?>

<!doctype html>
<html>
<head><title>Search Participant</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">		
</head>
<body>
<header style='background-color:gray';>		
	

	
		<img src="logoo.png" width="150px">
		
<nav>
		<ul>
			<li><a href="Main.php">Home</a></li>
			<li><a href="#sub">Subscriptions</a></li>
			<li><a href="#contact">contact</a></li>
			
			<?php  
			if (!isset($_SESSION['email']) && !isset($_SESSION['user_id']))
			{
				echo "<li><a href='login.php' style='color:green;'>Login/Sign in</a></li>";
			}
			else
			{	
				// check if the type of the user in ADMIN
				$qDetails = "select * from profile where user_id = {$_SESSION['user_id']} ";
				$rDetails = mysqli_query($conn,$qDetails)
						or die("Error in $qDetails");
				$Details = mysqli_fetch_assoc($rDetails);
				$Type = $Details['Type'];
				
				if($Type == 'Admin')
					echo "<li><a  href='searchform.php'>Search</a></li>";
				
				
				echo "<li><a href='Account.php'>Account</a></li>";
				echo "<li><a style='color: red;' href='logout.php'>Logout</a></li>";
				
			}
			
			?>
		</ul>
</nav>
</header>

<br><br><form name='f' method='post' action='searchresult.php'>

<table border=6px align=center width='50%'>

	<tr>
		<td align='center'  colspan='2'>
		<h3>Search For Participant</h3>
		</td>
	</tr>
	
	<tr>
	<th>User ID</th>
	<td><input type='text' name='uid'></td>
	</tr>
	
	<tr>
	<th>First Name</th>
	<td><input type='text' name='fn'></td>
	</tr>
	
	<tr>
	<th>Last Name</th>
	<td><input type='text' name='ln'></td>
	</tr>
	
	<tr>
	<th>Gender</th>
	<td><input type='radio' name='g' value='M'>Male
	<input type='radio' name='g' value='F'>Female
	</td>
	</tr>
	
	<tr>
	<th>Age</th>
	<td><input type='text' name='age'></td>
	</tr>
	
	<tr>
	<th>Governorate</th>
	<td>
	<select name="gove">
	<option value='x'>Select Governorate</option>
	<?php
	$govq="SELECT DISTINCT Governorate FROM profile;";
	$govr=mysqli_query($conn,$govq);
	while($gov=mysqli_fetch_assoc($govr))
	{
	echo "<option value='{$gov['Governorate']}'>
	            {$gov['Governorate']}
		  </option>";
	}

	?>
	</select>
	</td>
	</tr>
	
	<tr>
	<th>Package ID</th>
	<td>
	<?php

	$pacq="select * from packages";
	$pacr=mysqli_query($conn,$pacq) or die("Error in $pacq");
	while($pac=mysqli_fetch_assoc($pacr))
	{
	echo "<input type='radio' name='pid' 
	         value={$pac['Package_Id']}>{$pac['Package_name']}
			  <BR>";
	}
?>
	</td>
	</tr>
	
	<tr>
	<th colspan="2">
	<input type='submit' name='s' value='Search'>
	<input type='reset' name='r' value='clear'>
	</th>
	</tr>
	
</table>
</form>
</body>
</html>	


<?php  } ?>