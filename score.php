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
<?php if($_SESSION['id']!=1){

	?>
<table>
	<br>
	<br>
	<div align="centre">ASSIGNMENTS AND MARKS OF <?php echo $_SESSION['hi']; ?> </div>
		<tr>
			<th>NAME&nbsp;</th>
			<th>ASSIGNMENT NAME&nbsp;</th>
			<th>LINK&nbsp;</th>
			<th>DATE OF SUBMISSION&nbsp;</th>
			<th>MARKS&nbsp;</th>
		</tr>
<?php 
		$qu="SELECT * from submissions";
			$r=mysqli_query($conn,$qu);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
 ?>
 		      <tr>
 		      	<th><?php echo $row['sname']; ?>&nbsp;</th>
 		      	<th><?php echo $row['N_Of_A']; ?>&nbsp;</th>
 		      	<th><a href="Uploads/<?php echo $row['filename'];?>"><?php echo $row['filename']; ?>&nbsp;</a></th>
 		      	<th><?php echo $row['date_of_submission']; ?>&nbsp;</th>
 		      	<th><?php if($row['Marks']==0){
 		      		$_SESSION['theguy']=$row['sname'];
 		      		$_SESSION['theass']=$row['N_Of_A']
 		      		?>
 		      		<form action="updatemarks.php" method="post">
 		      			<input type="number" name="numf">
 		      			<input type="submit" name="scorrrr" value="submit" required>
 		      		</form>
 		      		<?php }else{ echo $row['Marks']; } ?></th>
 		       </tr>
 		   <?php }
 		   } 
 		   ?>
			

</table>
<?php } ?>



<? include ('footer.php'); ?>