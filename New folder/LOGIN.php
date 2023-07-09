<title>Log In</title>
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.1-web\css\all.css">
<link rel="stylesheet" type="text/css" href="StyleFiles.css">

<script>
	function showpass() {
	 var a = document.getElementById("InputPass");
  if (a.type == "password") {
    a.type = "text";
  } else {
    a.type = "password";
  }
}
</script>



<br><br><br>
	<center><form action="LOGIN_VALIDATION.php" method="post">
		<table border="0" class="formtable">
			<th class="formHeading">LOG IN</th>
			<tr>
				<td align="center">
					<i class="fas fa-user icon"></i>
					<input required type="text" class="input" name="Username" autocomplete="off">
				</td>
			</tr>
			<tr>
				<td align="center">
					<i class="fas fa-lock icon"></i>
					<input required type="password" class="input" name="Password" autocomplete="off" id="InputPass">
					<p align="center"><input type="checkbox" onclick="showpass()">Show</p>
				</td>
			</tr>
			<tr>
				<td align="center">
					<button type="submit" class="Submit" name="login"> LOG IN</button></td>
			</tr>
			<tr>
				<td align="center"><a href="CHANGE.php"> Change Username and Password</a></td>
			</tr>
		</table>
	</form></center>


<?php
//$_GET['valid'] is set 'invalid' in the VALIDATION.php page when the login details are invalid
//$_GET['change'] is set 'success' in the CHANGE.php page when the changes to username and password are successfull
//$_GET['logout'] is set 'true' when the user clicks on logout button in any page
	if(isset($_GET['valid']))
		{
			if($_GET['valid']=='invalid')
				echo "<script>alert('Invalid userame and password')</script>";
		}

	if (isset($_GET['change'])) 
		{
		   if($_GET['change']=='success')
		   	echo "<script>alert('Userame and Password has been successfully changed')</script>";

		}


	if (isset($_GET['logout'])) 
		{
		   if($_GET['logout']=='true')
		   	echo "<script>alert('Successfully logged out')</script>";

		}

?>