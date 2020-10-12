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

 if(isset($_POST['val'])){
 	$subject=$_POST['sub'];
 	$name=$_POST['asn'];
 	$question=$_POST['que'];
 	$date=$_POST['date'];
 	
 	$credits=$_POST['credz'];
 	$que="INSERT INTO assignments(subject,assignment_name,question,date,credits) VALUES('$subject','$name','$question','$date','$credits')";
 	if (mysqli_query($conn, $que)) {
    	echo "New record created successfully";
    	header("location:welcome.php");
	} else {
    	echo "Error: " . $que . "<br>" . mysqli_error($conn);

 }
}


?>