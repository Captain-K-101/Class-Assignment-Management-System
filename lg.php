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

if(isset($_POST['login'])){
	$users=$_POST['User'];
	$pass=$_POST['pass'];

	$q="SELECT * FROM magament WHERE user= '$users' AND pass='$pass'";

	$r=mysqli_query($conn,$q);
	$s=mysqli_fetch_array($r);
	if ($s['users']!=$users  && $s['pass']!=$pass)
    {
        echo "THE USERNAME AND PASSWORD ARE INCORRECT";
    }
else {
		$_SESSION['hi']=$users;
		$_SESSION['id']=$s['ID'];
		$_SESSION['ist']=$s['isteacher'];
		$_SESSION['appr']=$s['isapproved'];
        header("location:welcome.php");

     }
}

?>