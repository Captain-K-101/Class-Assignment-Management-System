<?php
session_start();
$servername = "localhost";
 $username = "nikhil";
 $password = "password";
 $dmname="test";

 $conn=new mysqli($servername,$username,$password,$dmname);

 if($conn->connect_error){
 	echo 'Error';
 }

 if(isset($_POST['aayo'])){
 	$rp=$_SESSION['RQ'];
 	$rsss=$_SESSION['hi'];
 	$qer="update bug set severity=1+severity where description='$rp'";
if (mysqli_query($conn, $qer)) {
 	   echo "Record updated successfully";
			} else {
   		 echo "Error updating record: " . mysqli_error($conn);
		}
	$ins="INSERT INTO voting(name,bug_name) VALUES('$rsss','$rp')";
	if(mysqli_query($conn,$ins)){
		echo "updated";
		  header("location:showbugs.php");
	}
	else{
		echo "failed to upload in voting";
	}

	}

?>