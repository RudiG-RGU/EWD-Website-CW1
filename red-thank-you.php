<?php
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
$con=mysqli_connect("localhost","root","Password","click_counter");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} else {


  $countNo = mysqli_query($con, "SELECT * from `clicks`");
  $results = mysqli_fetch_array($countNo, MYSQLI_NUM);

  $sql = "UPDATE clicks SET red=$results[0]+1";  
  mysqli_query($con, $sql);

  mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>The Choice - Thank You</title>
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

            <p class="p2">Thank You</p>

            <div id="results-line">
            </div>

            <h4>Thank you for participating in The Choice.</h4>
            <h6>Your choice has been collected and stored with other users and will be reviewed by admins.</h6>

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