<?php
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
	//Please set the following variables for your mysql database:
	$db_hostname = "localhost";  //usually "localhost be default"
	$db_username = "root";  //your user name "I use root"
	$db_pass = "Password";  //the password for your user "root folder have not password"
	$db_name = "click_counter";  //the name of the database
	
	
	/*MYSQL DATABASE CONNECTION/ TRACKING FUNCTIONS
	--------------------------------------*/
	// connect to database
	$dbh = mysql_connect ($db_hostname, $db_username, $db_pass) or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db ($db_name);
	
	// get value from hidden feild
	$table_name = $_POST["inp1"];
	
	// select value from dtabae
	$getData = mysql_query("SELECT table_name FROM Data_Feild"); 
	$num_rows = mysql_num_rows($getData);
	
	if($num_rows==0)
	{
		$writeData = mysql_query("INSERT INTO table_name (column1) VALUES ($table_name)" );
	
	}
	else if ($num_rows > 0){
		$writeData = mysql_query('UPDATE table_name SET column1 ="'.$table_name.'"');
	}
	else{
		mysql_error();
	}
	
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

	<script language="javascript">
			function cnt()
			{
				var count=parseInt(document.frm1.inp1.value);
				count++;
				document.frm1.inp1.value=count;
				//alert(document.frm1.inp1.value);
			}
			</script>
</head>

<body>

	<div id="contents">

		<div id="results">

			<p class="p2">RESULTS</p>

			<div id="results-line">

			</div>

			<form name="frm1" method="post" action="">
			<h1>Evet Handler with multiple statements</h1>
			<p>Displays the number of times you click on your image.</p>
			<img src="pill.png" onClick="cnt()"/>
			<input type="hidden" name="inp1" value="0"/>
			<input type="submit" name="submit" value="Submit"/>
			</form>

			<div id="result-red">

				<div id="result-red-text">
					<h2> <?php print $visits; ?> </h2>
				</div>
			</div>

			<div id="result-blue">
				<div id="result-blue-text">
					<h1></h1>
				</div>
			</div>

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