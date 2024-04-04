<?php
$gov = [
  "DA" => "Ad Dakhiliyah",
  "ZA" => "Ad Dhahirah",
  "BS" => "Al Batinah North",
  "BJ" => "Al Batinah South",
  "WU" => "Al Wusta",
  "SS" => "Ash Sharqiyah North",
  "SJ" => "Ash Sharqiyah South",
  "BU" => "Buraymi",
  "ZU" => "Dhofar",
  "MU" => "Musandam",
  "MA" => "Muscat"
];

$gen = ['M' => 'Male', 'F' => 'Female'];

// Set The ID as The last ID + 1 
include "connect.php";
$q = "select max(user_id) from profile";
$r = mysqli_query($conn,$q)
		or die("Error in $q");
$row = mysqli_fetch_row($r);
$new_id = $row[0]+1;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1,h3 {
      text-align: center;
    }

    fieldset {
      border: none;
      padding: 0;
      margin: 0;
    }

    legend {
      font-weight: bold;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
	input[type="date"]	{
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Horse Riding Club</h1>
	<h3>Register</h3>
    <form name="signup" method="post" action="signupProcess.php">
      <fieldset>
        <legend>Enter Your Details</legend>
		<label for="id">ID:</label>
        <input id="id" name="id" type="text" value = <?php echo $new_id; ?> readonly><br><br>
		
        <label for="name">First Name:</label>
        <input id="name" name="fname" type="text" ><br><br>
		
		<label for="name">Last Name:</label>
        <input id="name" name="lname" type="text" ><br><br>
		
        <label>Gender:</label>
        <?php
        foreach ($gen as $k => $v) {
          echo "<input type='radio' name='gen' value='$k'>$v";
        }
        ?><br><br>
		<label for="dateofbirth">Date of Birth:</label>
        <input id="date" name="dateofbirth" type="date" ><br><br>
		<br><br>
		
		<label for="email">Email:</label>
        <input id="email" name="mil" type="email" ><br><br>
		
        <label for="password">Password:</label>
        <input id="password" name="pas" type="password" ><br><br>

        

        <label for="phone">Phone Number:</label>
        <input id="phone" name="ph" type="text" ><br><br>

        <label for="governorate">Governorate:</label>
        <select id="governorate" name="gov" >
          <option value="0">Select Governorate</option>
          <?php
          foreach ($gov as $k => $v) {
            echo "<option value='$v'>$v</option>";
          }
          ?>
        </select><br><br>

        <input name="sub" type="submit" value="Sign Up">
		
      </fieldset>
    </form>
  </div>
</body>
</html>