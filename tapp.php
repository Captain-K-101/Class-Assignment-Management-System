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
	<div align="centre"> TECHERS TO BE APPROVED</div>
		<tr>
			<th>ID&nbsp;</th>
			<th>NAME&nbsp;</th>
			<th>Email&nbsp;</th>
			<th>APPROVE&nbsp;</th>
		</tr>
<?php 
		$qu="SELECT * from magament where isteacher=1 and isapproved=1";
			$r=mysqli_query($conn,$qu);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
 ?>
 		      <tr>
 		      	<th><?php echo $row['ID']; ?>&nbsp;</th>
 		      	<th><?php echo $row['user']; ?>&nbsp;</th>
 		      	<th><?php echo $row['email']; ?>&nbsp;</th>
 		      	<th><a href="approval.php?id=<?php echo $row['ID']; ?>" role="button">approve</a>&nbsp;</th>
 		      </tr>
 		   <?php }
 		   } 
 		   ?>
			

</table>
<?php } ?>
<?include ('footer.php'); ?>