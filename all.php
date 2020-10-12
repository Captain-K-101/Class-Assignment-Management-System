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

if(!isset($_SESSION['hi'])){
	header("location:index.php");
}else{
	if ($_SESSION['id']==1) {
	}else{
		if($_SESSION['ist']==1){
			if($_SESSION['appr']==0){

			echo $_SESSION['hi'];
			?>
			<div>ALL CURRENT RUNNING ASSIGNMENTS
			<table>
				<tr>
					<th>Subject &nbsp</th>
					<th>Assignment Name &nbsp </th>
					<th>Date of submission &nbsp</th>
					<th>Credits &nbsp</th>
				</tr>
				<?php 
		$qu="SELECT * from assignments where date >= CURDATE() ";
			$r=mysqli_query($conn,$qu);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
 ?>
 		      <tr>
 		      	<th><?php echo $row['subject']; ?>&nbsp;</th>
 		      	<th><?php echo $row['assignment_name']; ?>&nbsp;</th>
 		      	<th><?php echo $row['date']; ?>&nbsp;</th>
 		      	<th><?php echo $row['credits']; ?>&nbsp;</th>
 		      </tr>
 		   <?php }
 		   } 
 		   ?>
			</table>
			</div>
			<br><br><br><br><br><br><br><br><br>
			<div>ALL ASSIGNMENTS TILL DATE
			<table>
				<tr>
					<th>Subject &nbsp</th>
					<th>Assignment Name &nbsp </th>
					<th>Date of submission &nbsp</th>
					<th>Credits &nbsp</th>
				</tr>
				<?php 
		$qu="SELECT * from assignments";
			$r=mysqli_query($conn,$qu);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
 ?>
 		      <tr>
 		      	<th><?php echo $row['subject']; ?>&nbsp;</th>
 		      	<th><?php echo $row['assignment_name']; ?>&nbsp;</th>
 		      	<th><?php echo $row['date']; ?>&nbsp;</th>
 		      	<th><?php echo $row['credits']; ?>&nbsp;</th>
 		      </tr>
 		   <?php }
 		   } 
 		   ?>
			</table>
			</div>

			<?php
		}
			
			else{
				header("location:welcome.php");
			}
		}
		else {
				header("location:welcome.php");
		}
		
	}
}

?>