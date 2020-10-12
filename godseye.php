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
<?php if($_SESSION['id']==1){

	?>
<table>
	<br>
	<br>
	<div align="centre">ALL ASSIGNMENTS</div>
		<tr>
			<th>ID&nbsp;</th>
			<th>NAME&nbsp;</th>
			<th>PASS&nbsp;</th>
			<th>email&nbsp;</th>
			<th>isteacher&nbsp;</th>
		</tr>
<?php 
		$qwert="SELECT * from magament";
			$r=mysqli_query($conn,$qwert);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
 ?>
 		      <tr>
 		      	<th><?php echo $row['ID']; ?>&nbsp;</th>
 		      	<th><?php echo $row['user']; ?>&nbsp;</th>
 		      	<th><?php echo $row['pass']; ?></th>
 		      	<th><?php echo $row['email']; ?>&nbsp;</th>
 		      	<th><?php echo $row['isteacher']; ?></th>
 		       </tr>
 		   <?php }
 		   } 
 		   ?>
			

</table>
<?php }else{echo "fail";} ?>
