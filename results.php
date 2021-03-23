<?php

$host = "localhost";      // MySQL Host
$user = "root";             // Username for you database
$pass = "Password";             // Password with your username
$dbname = "click_counter";           // Database Name


// Get url input
$inputUrl = $_GET['forward'];

// Format input URL for recording and redirecting
if (stripos($inputUrl, "http://") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("http://"));

} elseif (stripos($inputUrl, "https://") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("https://"));

} elseif (stripos($inputUrl, "//") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("//"));

} else {

	$redirectUrl = "http://" . $inputUrl;
	$recordUrl = $inputUrl;

}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} 

// sql to create table
$sql = "CREATE TABLE ClickRecord (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Url TEXT NOT NULL,
Clicks INT UNSIGNED NOT NULL
)";

if ($conn->query($sql) === TRUE) {

	//echo "Checking Table...<br>";
	//echo "Table created successfully<br>";

	// Insert new row
	//echo "Inserting...<br>";
	$sql = "INSERT INTO ClickRecord (Url, Clicks)
	VALUES ('$recordUrl', '1')";

	// Check if row added successfully
	if ($conn->query($sql) === TRUE) {
		
		//echo "Checking Row...<br>";

	} else {

		//echo "Error: " . $sql . "<br>" . $conn->error;

		// Updating existing row
		//echo "Checking Row...<br>";
		//echo "Updating...<br>";
		$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$recordUrl}'";

		// Check if row updated successfully
		if ($conn->query($sql) === TRUE) {

			//echo "Record updated successfully";

		} else {

			//echo "Error updating record: " . $conn->error;

		}

	}

} else {

	//echo "Updating Existing Record...<br>";
	
	$sql = "SELECT Url FROM ClickRecord WHERE Url='{$recordUrl}'";
	$checkResult = $conn->query($sql);

	if ($checkResult->num_rows == 1) {

		// output data of the row
		while($checkRow = $checkResult->fetch_assoc()) {

			$output = $checkRow["Url"];

		}

			if ($output == $recordUrl) {

				// Updating existing row
				$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$recordUrl}'";

				// Check if row updated successfully
				if ($conn->query($sql) === TRUE) {

					//echo "Record updated successfully";

				} else {

					//echo "Error updating record: " . $conn->error;

				}

			}

	} else {

		// Insert new row
		$sql = "INSERT INTO ClickRecord (Url, Clicks)
		VALUES ('$recordUrl', '1')";

		// Check if row added successfully
		if ($conn->query($sql) === TRUE) {

			//echo "New record created successfully";

		} else {

			//echo "Error: " . $sql . "<br>" . $conn->error;

		}

	}

}

header("Location: ".$redirectUrl);

/*
	Written by Steve-luo <https://steve-luo.com>
	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

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
					<h2 <?php echo $clicks; ?> </h2>
				</div>
			</div>

			<div id="result-blue">
				<div id="result-blue-text">
					<h1 <?php echo $clicks; ?> </h1>
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