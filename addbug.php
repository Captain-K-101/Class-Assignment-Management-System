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
 $nme= $_FILES['file']['name'];

$tmp_nme= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['aaaaaaaaaa'];

$position= strpos($nme, "."); 

$description= $_POST['bug'];
$nameee=$_POST['namo'];

if (isset($nme)) {

$path= 'bugs/';
$nme=$nameee."-".$description.".txt";
if(file_exists( $path.$nme)){
                echo $nme . " is already exists.";
 }else{

if (!empty($nme)){
if (move_uploaded_file($tmp_nme, $path.$nme)) {
if(!empty($description)){
	
			$insert="INSERT INTO bug(description,file,date_of,name_of,severity) values('$description','$nme',CURDATE(),'$nameee',0) ";
 		if (mysqli_query($conn, $insert)) {	
 			echo "Success";
 		}
 		else{
 			echo "table not created";
 		}
#(sname varchar(225),N_Of_A varchar(225),filename varchar(225),date_of_submission DATE,Marks int);


echo 'Uploaded!';


}else{
	echo"not Uploaded";
}
}
else{
	echo "did not move";
}
}else{
	echo "name not set";
}
}
}else{
	echo "NNNNNNNNA not set";
}

?>