<?php
session_start();
include('header.php');
?>
<form action="givup.php" method='post' enctype="multipart/form-data">
	<p><?php echo $_SESSION['hi'];?></p>
NAME OF ASSIGNMENT: <input type="text" name="description_entered"/><br><br>
<input type="file" name="file"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>

</form>


<?php include('footer.php'); ?>