<?php
include "connect.php";
session_start();
if(isset($_SESSION['user_id'])) // To Ensure Security
{
	
	
// Fetch user details
$accountq = "SELECT user_id, first_name, last_name, age, Governorate, phone_number
            FROM profile
            WHERE user_id = {$_SESSION['user_id']} ";

$accountr = mysqli_query($conn, $accountq) or die ("Error in connection: $accountq");
$account = mysqli_fetch_assoc($accountr);

// Fetch subscription details
$qSubscreptionDetails = "SELECT package_name, starting_date, ending_date
                        FROM subscriptions
                        JOIN packages USING(Package_id)
                        WHERE user_id = {$_SESSION['user_id']}
						and STATUS = 'Active'";

$rSubscreptionDetails = mysqli_query($conn, $qSubscreptionDetails) or die("Error in query: $qSubscreptionDetails");
$SubscreptionDetails = mysqli_fetch_assoc($rSubscreptionDetails);
?>

<!DOCTYPE html>
<html>

<head>
    <title>ACCOUNT Details</title>
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
    
	<br><br><form name="F" method="post" action='Updatesub.php'>
        <table border="1" width="50%" align="center">
            <tr>
                <th colspan="2" bgcolor="lightblue">Account Form</th>
            </tr>
			
            <tr>
                <th>ID</th>
                <td><input type='text' name='id' value=<?php echo $_SESSION['user_id']; ?> readonly></td>
			</tr>
			
			<tr>	
                <th>First Name</th>
                <td><input type='text' name='fn' value='<?php echo $account['first_name']; ?>'></td>
			</tr>
			
			<tr>
                <th>Last Name</th>
                <td><input type='text' name='ln' value='<?php echo $account['last_name']; ?>'></td>
            </tr>
			
            <tr>
                <th>Governorate</th>
                <td>
                    <select name='gov'>
                        <option value='x'>Select the Governorate</option>
                        <?php
                        // Extract the Governorate names from the profile table to populate the dropdown.
                        $qgov = "SELECT DISTINCT Governorate FROM profile";
                        $rgov = mysqli_query($conn, $qgov) or die ("Error in query: $qgov");
                        while ($gov = mysqli_fetch_assoc($rgov)) {
                            echo "<option value='{$gov['Governorate']}'";
                            if ($account['Governorate'] == $gov['Governorate']) {
                                echo ' selected';
                            }
                            echo '>';
                            echo $gov['Governorate'];
                            echo '</option>';
                        }
                        ?>
                    </select>
                </td>
			</tr>
			
			<tr>
				<th>Phone Number</th>
				<td><input type='text' name='phone' value=<?php echo $account['phone_number']; ?>></td>
			</tr>
			
			<tr>
                <th>Package Subscription</th>
				<td><input type='text' name='Package_name' readonly value=<?php echo $SubscreptionDetails['package_name']; ?>></td>
			</tr>

			<tr>
				<th>Age</th>
                <td><input type='text' name='age' value=<?php echo $account['age']; ?> readonly></td>
			</tr>

			<tr>
				<th>Starting Date</th>
                <td><input type='date' name='Starting_date' readonly value=<?php echo $SubscreptionDetails['starting_date']; ?>></td>
			</tr>

			<tr>
				<th>Ending Date</th>
                <td><input type='date' name='Ending_date' readonly value=<?php echo $SubscreptionDetails['ending_date']; ?>></td>
            </tr>
            <tr>
                <td align=center colspan=2 bgcolor="lightblue">
                    <input type=submit name=s value='Update Details'>
                </td>
            </tr>
        </table>
    </form>
	
	
	



</body>

</html>



<?php } ?> 
