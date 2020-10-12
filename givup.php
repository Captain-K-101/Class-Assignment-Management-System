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

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 


$description= $_POST['description_entered'];

if (isset($name)) {

$path= 'Uploads/';
$sessions=$_SESSION['hi'];
$name=$sessions."-".$description.".txt";
if(file_exists( $path.$name)){
                echo $filename . " is already exists.";
 }else{

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
if(!empty($description)){
	
			$insert="INSERT INTO submissions(sname,N_Of_A,filename,date_of_submission,Marks) values('$sessions','$description','$name',CURDATE(),0) ";
 		if (mysqli_query($conn, $insert)) {	
 			echo "Success";
 		}
#(sname varchar(225),N_Of_A varchar(225),filename varchar(225),date_of_submission DATE,Marks int);


echo 'Uploaded!';
header("location:welcome.php");

}else{
	echo"not Uploaded";
}
}
else{
	echo "name is empty";
}
}else{
	echo "name not set";
}
}
}
?>

