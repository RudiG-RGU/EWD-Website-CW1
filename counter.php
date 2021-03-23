<?php

//1. include the configuration file
  include("config.php");

//2. Get the id from the url and store it into a variable
  $id = mysqli_real_escape_string($link, $_GET['id']);

//3. fetch the url and clicks from this banner
  $clicks = mysqli_fetch_object(mysqli_query($link, "SELECT url, clicks FROM banners WHERE id=".$id.""));

//4. increase clicks with 1
  $new_click = $clicks->clicks+1;

//5. update this into the database, check if it was succesfull
  if(mysqli_query($link, "UPDATE banners SET clicks=".$new_click." WHERE id=".$id."")):
  //6. redirect to the url
  header("Location: ".$clicks->url);
  else:
  //6. else write to error log
  endif;
?>