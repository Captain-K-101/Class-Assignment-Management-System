<?php 
session_start();
$servername = "localhost";
 $username = "nikhil";
 $password = "password";
 $dmname="test";
 $conn=new mysqli($servername,$username,$password,$dmname);

 if($conn->connect_error){
 		die("failed to connect".$conn->connection_error);
 }
include('header.php');
?>
<table>
	<tr>
	<th>description of bug&nbsp;</th>
	<th>Name of finder&nbsp;</th>
	<th>file&nbsp;</th>
	<th>date of finding&nbsp;</th>
	<th>severity voting buy</th>
	</tr>
<?php
$sss=$_SESSION['hi'];
	$qp="Select * from bug ORDER BY severity DESC ";
	$r=mysqli_query($conn,$qp);
	if(mysqli_num_rows($r)>0){
		while ($row=mysqli_fetch_assoc($r)) {
		?>
		<tr>
			<th><?php echo $row['description']; ?></th>
			<th><?php echo $row['name_of']; ?></th>
			<th><a href="bugs/<?php echo $row['file']; ?>"><?php echo $row['file']; ?></a></th>
			<th><?php echo $row['date_of'];?></th>
			<th><?php 
			$RQ=$row['description'];
					$wdq="Select * from voting where name='$sss' and bug_name = '$RQ' ";
					$lkd=mysqli_query($conn,$wdq);

					if($lkd->num_rows != 0){
						echo $row['severity'];}else{
							?>
							<form action="vote.php" method="post">
								<?php 
								$_SESSION['RQ']=$RQ;
								?>
									<p><input type="submit" value="vote" name="aayo"></p>
							</form>
							<?php
						}
						?>
				</th>
		</tr>			
<?php
}
}

?>

</table>

<?php include('footer.php'); ?>