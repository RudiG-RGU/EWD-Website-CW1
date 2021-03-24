<?php
// Error checking
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
//connects to SQL database
$con=mysqli_connect("localhost","root","Password","click_counter");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} else {

//Retrieves data from SQL server
  $countNo = mysqli_query($con, "SELECT * from `clicks`");
  $results = mysqli_fetch_array($countNo, MYSQLI_NUM);

  mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon" />
</head>

<body>

	<div id="contents">

		<div id="results">

			<p class="p2">RESULTS</p>

			<div id="results-line">
			</div>

			<div id="result-red">
				
			<!--Retrieves results for red and blue clicks from array-->
				<div id="result-red-text">
					<h2> <?php echo "$results[0]"; ?> </h2>
				</div>
			</div>

			<div id="result-blue">
				<div id="result-blue-text">
					<h1> <?php echo "$results[1]"; ?> </h1>
				</div>
			</div>

		</div>

	</div>

	<!--Connects to Firebse Authentication key so user inputs can be reviewed-->
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>

	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>

	<script>
		// Initialise Firebase
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