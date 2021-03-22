<?php
//MySQL database variables
//You need to change these variables to be right for your MySQL install
$host = "localhost";
$user = "root";
$pass = "Password";
$dbname = "click_counter";
 
// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, Url, Clicks FROM ClickRecord ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	// output data of each row
	while($row = $result->fetch_assoc()) {

		echo "ID: " . $row["id"]. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: " . $row["Url"]. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clicks: " . $row["Clicks"]. "<br>";

	}

} else {

	echo "No Data Available";

}

$conn->close();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>The Choice - Rudi Greig</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link href="https://fonts.googleapis.com/css?family=Unica+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon" />
</head>

<body>

	<div id="contents-left">

		<a href="results.html">
			<script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
			<div class="figure">
				<img class="Sirv image-main">
				<img class="Sirv image-hover" data-src="images/rain.gif">
		</a>

	</div>

	<h1>RED PILL</h1>

	<div id="left-margin">
	</div>

	</div>

	<div id="contents-right">

		<a href="results.html">
			<script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
			<div class="figure-right">
				<img class="Sirv image-main">
				<img class="Sirv image-hover" data-src="images/flow.gif">
		</a>

	</div>

	<h2>BLUE PILL</h2>

	<div id="right-margin">

	</div>


	</div>

	<div id="footer">

		<div id="content-text1">

			<p class="line-1 anim-typewriter"> This is your last chance. After this there is no turning back, all I'm
				offering is the truth. Nothing more.</p>

		</div>

	</div>

	<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBbfl1dzKM-aYc3YFBm4-PBPutM24f0--0",
    authDomain: "the-choice-1f1f6.firebaseapp.com",
    projectId: "the-choice-1f1f6",
    storageBucket: "the-choice-1f1f6.appspot.com",
    messagingSenderId: "194155024479",
    appId: "1:194155024479:web:c37b7b3195207d11128bea",
    measurementId: "G-GG1E448JD2"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>


</body>