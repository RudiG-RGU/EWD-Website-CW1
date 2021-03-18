<?php
//MySQL database variables
//You need to change these variables to be right for your MySQL install
$host = "localhost";
$user = "user";
$pass = "pass";
$dbname = "databasename";
 
//DO NOT CHANGE THE FOLLOWING CODE!
 
//start a PHP session
//this prevents spamming the click count by refreshing the page
session_start();
 
//create current page constant
$curPage = mysql_real_escape_string(htmlspecialchars($_SERVER['PHP_SELF']));
 
//set number of clicks variable to 0
$clicks = 0;
 
//do not recount if page currently loaded
if($_SESSION['page'] != $curPage) {
   //set current page as session variable
   $_SESSION['page'] = $curPage;
 
   //try to connect to MySQL server
   if(!$link = mysql_connect($host, $user, $pass)) {
      echo "Could not connect to MySQL server. Check your login information; the MySQL server may also be offline or temporarily overloaded.";
   }
   //try to select database
   elseif(!mysql_select_db($dbname)) {
      echo "Cannot select database.";
   }
   else {
      //get current click count for page from database;
      //output error message on failure
      if(!$rs = mysql_query("SELECT * FROM click_count WHERE page_url = '$curPage'")) {
         echo "Could not parse click counting query.";
      }
      //if no record for this page found,
      elseif(mysql_num_rows($rs) == 0) {
         //try to create new record and set count for new page to 1;
         //output error message if problem encountered
         if(!$rs = mysql_query("INSERT INTO click_count (page_url, page_count) VALUES ('$curPage', 1)")) {
            echo "Could not create new click counter for this page.";
         }
         else {
            $clicks = 1;
         }
      }
      else {
         //get number of clicks for page and add 1
         $row = mysql_fetch_array($rs);
         $clicks = $row['page_count'] + 1;
         //update click count in database;
         //report error if not updated
         if(!$rs = mysql_query("UPDATE click_count SET page_count = $clicks WHERE page_url = '$curPage'")) {
            echo "Could not save new click count for this page.";
         }
      }
   }
}
?>