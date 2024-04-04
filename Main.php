<!DOCTYPE html>
<?php
//session_start();
session_start();
include "connect.php";
// Update The Status For Each Subscription ( Make it expired if The Duration Finished ) 
$TodayDate = date('Y-m-d');
$qStatus = "update subscriptions set STATUS='Expired' 
			where STATUS ='Active' and Ending_Date = '$TodayDate' ";
$rStatus = mysqli_query($conn,$qStatus)
			or die("Error in $qStatus");

?>
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horse Club</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<style>



</style>

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
	
	
	
<section>
	
			<div class="row">
			<div class="col-2">
			<h1 style="font-family": "Times New Roman", "Times, serif;">The Horse <br> Riding Club </h1>
			<P class="introduction" style="align:justify">A Horse Riding Club is a gathering of horse enthusiasts who share a love for horseback riding. It provides a platform for riders of all ages and skill levels to engage in equestrian activities. Clubs offer riding lessons, training, and boarding services, as well as access to trails for scenic rides. </P><br>
</p>
			<a href="#sub" class="btn">Subscriptions &#8594;</a>
			</div>
		<div class="col-2">
		<video width="700px" height="500px"controls autoplay muted loop>
		<source src="Horse.mp4" type="video/mp4">
		</video>
		</div>
		
		
		
</section>		
		
<br><br><br><br><br><br>	

<div class="pakages">
<h1 id="sub"style="text-align:center;font-size:70px;height:100px;
color:aqua"> Subscriptions </h1>	
<br><br><br><br><br>

<section id="subscription" class="sups">

 
 <a href="basic.php" > <img src="basicid.png" class="sups" alt="Image not found" width="400" height="300"> </a> 
 <a href="gold.php" > <img src="goldid.png" class="sups"  alt="Image not found" width="400" height="300"> </a> 
 <a href="premium.php" > <img src="premiumid.png"  class="sups" alt="Image not found" width="400" height="300"> </a>
 




</section>

</div>
<div style="height:300px">
</div>




<footer id="contact">
    <a href="mailto:contact@horseridingacademy.com">
		Contact us at: contact@horseridingacademy.com</a>
    <a href="#" target="_blank">Facebook</a>
    <a href="#" target="_blank">Twitter</a>
    <a href="#" target="_blank">Instagram</a>
	</p>
</footer>

</body>
</html>