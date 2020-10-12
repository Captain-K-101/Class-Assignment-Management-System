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

if(isset($_GET['id']) & !empty($_GET['id'])){
	$id=$_GET['id'];
	$qi="UPDATE magament SET isapproved=0 where ID=$id";
		if (mysqli_query($conn, $qi)) {
 	   echo "Record updated successfully";
 	   header("location:welcome.php");
			} else {
   		 echo "Error updating record: " . mysqli_error($conn);
		}
	}
else{
	echo "fail";
	}

?>

<?php include('footer.php');

