<?php
//MySQL database variables
//You need to change these variables to be right for your MySQL install
$host = "localhost";
$user = "root";
$pass = "Password";
$dbname = "click_counter";
 
//DO NOT CHANGE THE FOLLOWING CODE!
 
//start a PHP session
//this prevents spamming the click count by refreshing the page
session_start();
 
//create current page constant
$curPage = mysqli_real_escape_string(htmlspecialchars($_SERVER['PHP_SELF']));
 
//set number of clicks variable to 0
$clicks = 0;
 
//do not recount if page currently loaded
if($_SESSION['page'] != $curPage) {
   //set current page as session variable
   $_SESSION['page'] = $curPage;
 
   //try to connect to MySQL server
   if(!$link = mysqli_connect($host, $user, $pass)) {
      echo "Could not connect to MySQL server. Check your login information; the MySQL server may also be offline or temporarily overloaded.";
   }
   //try to select database
   elseif(!mysqli_select_db($dbname)) {
      echo "Cannot select database.";
   }
   else {
      //get current click count for page from database;
      //output error message on failure
      if(!$rs = mysqli_query("SELECT * FROM click_count WHERE page_url = '$curPage'")) {
         echo "Could not parse click counting query.";
      }
      //if no record for this page found,
      elseif(mysqli_num_rows($rs) == 0) {
         //try to create new record and set count for new page to 1;
         //output error message if problem encountered
         if(!$rs = mysqli_query("INSERT INTO click_count (page_url, page_count) VALUES ('$curPage', 1)")) {
            echo "Could not create new click counter for this page.";
         }
         else {
            $clicks = 1;
         }
      }
      else {
         //get number of clicks for page and add 1
         $row = mysqli_fetch_array($rs);
         $clicks = $row['page_count'] + 1;
         //update click count in database;
         //report error if not updated
         if(!$rs = mysqli_query("UPDATE click_count SET page_count = $clicks WHERE page_url = '$curPage'")) {
            echo "Could not save new click count for this page.";
         }
      }
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
</head>

<body>

	<div id="contents">

		<div id="results">

			<p class="p2">RESULTS</p>

			<div id="results-line">

			</div>

			<div id="result-red">

				<div id="result-red-text">
					<h2> <?php echo $clicks; ?> </h2>
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