
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
	input[type="date"]{
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
	a
	{
		
		width: 100%;
      padding: 10px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
	  text-decoration:none;
	}
	  a:hover {
      background: #45a049;
	  }
	
  </style>
</head>

<body>
  <div class="container">
    <h1>Horse Riding Club</h1>
	<h3>Welcome Back</h3>
    <form name="f1" method="post" action="loginProcess.php">
      <fieldset>
	  <legend>Enter Your Details</legend>
	  <label for="email">Email:</label>
      <input id="email" name="mil" type="email" required><br><br>
		
	  <label for="password">Password:</label>
      <input id="password" name="pas" type="password" required><br><br>	
	  
	  
	 <input name="sub" type="submit" value="Log In"><br><br>
	 
	 
       
	   
	   <h3 align='center'>If you don't have account please</h3><br>
	   <a href="singup.php" style="margin-left:165px;">Sign Up</a>
	 
	     
	  
	  
</fieldset>
    </form>
  </div>
</body>
</html>