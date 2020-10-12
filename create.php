<?php
session_start();
 $servername = "localhost";
 $username = "nik";
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
<div>
	<form method="POST" action="add.php">
		<p>Subject<input type="text" name="sub"></p><br><br>
		<p>NAME<input type="text" name="asn"></p><br><br>
		<p>question<input type="text" name="que"></p><br><b></b>
		<p>DATE OF SUBMISSION <input data-provide="datepicker" name="date" data-date-format="yyyy-mm-dd" placeholder="Select date" required></p><br><br>
		<p>Credits<input type="number" name="credz"></p>
		<br><br>
		<p><input type="submit" value="Submit" name="val"  required><br></p>
	</form>
</div>
<?php include('footer.php'); ?>