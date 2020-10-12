<?php 
session_start();
$servername = "localhost";
 $username = "nikhil";
 $password = "password";
 $dmname="test";
  //create connection
 $conn = new mysqli($servername, $username, $password,$dmname);
  //Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

include('header.php');
?>
<form action="addbug.php" method="post" enctype="multipart/form-data">
	<th>YOUR NAME<input type="text" name="namo"></th><br><br>
	<th>Name_of_Bug<input type="text" name="bug"></th><br><br>
	<input type="file" name="file"/><br><br>
	<input type="submit" name="aaaaaaaaaa" value="Upload"/>



</form>

<? include ('footer.php'); ?>