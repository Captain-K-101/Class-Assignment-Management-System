<?php
include('header.php');
?>
<div>
	<form  method="POST" action="lg.php">
		<p>User<input type="text" name="User" autocomplete="off" required></p>
		<p>Pass<input type="password" name="pass" autocomplete="off" required>
		<p><input type="submit" value="login" name="login" value="" required><br></p>
	</form>
	<a href="register.php">NOT REGISTERED CLICK HERE</a><br><br>
	<a href="bugbountyhunter.php">BUGBOUNTY REG </a>
</div>
<?php include('footer.php')?>