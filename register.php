<?php  
session_start();
include('header.php');
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

?>

<div>
	<form method="POST" action="reg.php">
		<p>USERNAME<input type="text" name="user" autocomplete="off" required></p>
		<p>PASSWORD<input type="password" name="pass1" required></p>
		<p>Retype the password<input type="password" name="pass2" required></p>
		<p>email<input type="text" name="email" required>
		<p>are u a teacher<input type="number" name="ayt" value="0">
		<p><input type="submit" value="Register" name="register" value="" required><br></p>
	</form>



</div>

<?php include('footer.php'); ?>