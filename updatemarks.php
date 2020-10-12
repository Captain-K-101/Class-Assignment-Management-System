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
if(isset($_POST['scorrrr'])){
$marks=$_POST['numf'];
$guy=$_SESSION['theguy'];
$ass=$_SESSION['theass'];
$queerrr="UPDATE submissions SET Marks=$marks where sname='$guy'AND N_Of_A='$ass' ";
		if (mysqli_query($conn, $queerrr)) {
 	   echo "Record updated successfully";
 	   header("location:score.php");
			} else {
   		 echo "Error updating record: " . mysqli_error($conn);
		}
	}
else{
	header("location:index.php");
	}

?>

<?php include('footer.php'); ?>