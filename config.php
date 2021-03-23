<?php
//MySQL database variables
//You need to change these variables to be right for your MySQL install
$host = "localhost";
$user = "root";
$pass = "Password";
$dbname = "click_counter";
 
$link = mysqli_connect($host,$user,$pass) or die("Cannot connect");
mysqli_select_db($link, $dbname) or die("Cannot select the database"); 
?>