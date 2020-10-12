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

 if(isset($_POST['register'])){
 	$user=$_POST['user'];
 	$pass1=$_POST['pass1'];
 	$pass2=$_POST['pass2'];
 	$email=$_POST['email'];
 	$ayt=$_POST['ayt'];
 	$isapproved=1;


 	if($pass1==$pass2){
 	$insert="INSERT INTO magament(user,pass,email,isteacher,isapproved) values('$user','$pass1','$email',$ayt,$isapproved) ";
 		if (mysqli_query($conn, $insert)) {
		$_SESSION['yaay']=$user;
    	echo "New record created successfully";
    	$_SESSION['hi']=$user;
    	$_SESSION['ist']=$ayt;
    	header("location:index.php");
	} else {
    	echo "Error: " . $insert . "<br>" . mysqli_error($conn);
	}
 	}
 	else{
		echo "Pwrd not matching";
	}
 }
?>