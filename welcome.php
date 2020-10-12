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
<?php 
if(!isset($_SESSION['hi'])){
	header("location:index.php");
}else{
	echo "welcome ";
	if ($_SESSION['id']==1) {
		echo "Admin";
	}else{
		if($_SESSION['ist']==1){
			if($_SESSION['appr']==0){
				echo " TEACHER ";
			echo $_SESSION['hi'];
		}
			
			else{
				echo "account approval is pnding by the admin";
			}
		}
		else {
			echo " STUDENT ";
			echo $_SESSION['hi'];
		}
		
	}
}
?>
<br>
<br>
<a href="logout.php">LOGOUT</a>
<br><br>
<a href="showbugs.php">BUGSREPORT</a>
<?php 
	if($_SESSION['id']==1){ 
?>

<br><br>
<a href="tapp.php">APPROVE TEACHERS ACCOUNTS</a><br><br>
<a href="godseye.php">THE GODS EYE </a>
<?php }
elseif ($_SESSION['ist']==1) {
		if ($_SESSION['appr']==0) { ?>
			<br><br>
			<a href="create.php">Create an assignment</a><br><br>
			<a href="all.php">allassignments</a><br><br>
			<a href="score.php">SEE ALL STUDENT SUBMISSIONS</a><br><br>
		<?php }
}else{
			$qu="SELECT * from assignments where date < CURDATE() ";
			$r=mysqli_query($conn,$qu);
			if (mysqli_num_rows($r) > 0) {
 		   while($row = mysqli_fetch_assoc($r)) {
	?>
	 <marquee><?php echo "THE DATE FOR SUBMISSION OF ASSIGNMENT ";echo $row['assignment_name']; echo " is over"; ?></marquee>  
<?php }} ?>
	<br>
	<br>
	<a href="show.php">ALL PENDING ASSINGMENTS</a><br><br>
	<a href="give.php">SUBMIT ASSIGNEMTS</a><br><br>
	<a href="grade.php">SEE GRADE FOR ASSIGNMENT</a><br><br>
	<?php } ?>
<?php include('footer.php');?>