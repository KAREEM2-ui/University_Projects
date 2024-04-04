<!DOCTYPE html>
<html>
<head>
  <title>Basic Package Subscription</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      margin-top: 0;
      color: #333;
    }

    .package {
      width: 300px;
      padding: 20px;
      margin: 20px auto;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .package h3 {
      color: #333;
    }

    .package p {
      color: #777;
    }

    .package .price {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .package .benefits {
      text-align: left;
      margin-top: 20px;
    }

    .package .benefits ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .package .benefits li {
      margin-bottom: 10px;
    }

    .package .btn {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      background-color: #4caf50;
      color: #fff;
      text-decoration: none;
      text-align: center;
      margin-top: 10px;
    }

    .package .btn:hover {
      background-color: #45a049;
    }

    .package .dog-image {
      margin-top: 20px;
    }

    .package .dog-image img {
      width: 200px;
	  max-width:100%;
	  height: auto;
      border-radius: 0;
      border: 2px solid #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Basic Package Subscription</h2>
    <div class="package">
      <h3>Basic Package</h3>
	  <div class="dog-image">
        <img src="basicid.png" alt="Gold Package ID">
      </div>
      <p class="price">20 OMR / 1 Month</p>
      <div class="benefits">
        <ol>
          <li>    Access to club facilities during specified hours.</li>
          <li>Limited or occasional use of riding arenas and trails.</li>
          <li>Basic riding lessons for beginners.</li>
          <li>Minimal participation in club events and competitions.</li>
		  <li>No additional perks or discounts.</li>
        </ol>
      </div>
      
      <a href="PackageProcrss.php?Package_id=101" class="btn">Subscribe Now</a>
    </div>
  </div>
</body>
</html>