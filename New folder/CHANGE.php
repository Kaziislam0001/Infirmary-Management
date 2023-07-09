<!-- This is to change user name and password  -->


<link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.1-web\css\all.css">
<link rel="stylesheet" type="text/css" href="StyleFiles.css">


<script>
	function showcurpass() {
	 var op= document.getElementById("InputcurPass");
  if (op.type == "password") 
    op.type = "text";
   else 
    op.type = "password";
	}
	function shownewpass(){
	   var np= document.getElementById("InputNewPass");
	  if (np.type == "password") 
	    np.type = "text";
	  else 
	    np.type = "password";
	}
	function shownewpassrepeat(){
	var npr= document.getElementById("InputNewPassrepeat");
	  if (npr.type == "password") 
	    npr.type = "text";
	   else 
	    npr.type = "password";
	}
</script>


<br><br><br>
	<center><form action="CHANGE_VALIDATION.php" method="post">
		<table border="0" class='formTable'>
			<th class="formHeading">CHANGE USERNAME/PASSWORD</th>
			<tr>
				<td align="center"><i class="fas fa-user icon"></i>
					<input class="input" required type="text" name="curUsername" placeholder="Current Username" autocomplete="off">
				</td>
			</tr>
			<tr>
				<td align="center" >
					<i class="fas fa-lock icon"></i>
					<input class="input" required type="password" name="curPassword" placeholder="Current Password" autocomplete="off" id="InputcurPass">
					<p align="center"><input type="checkbox" onclick="showcurpass()">Show</p>
				</td>
			</tr>
			<tr><td  align="center" height="50px"></td></tr><!--this is to give some vertical space-->
			<tr>
				<td align="center"><i class="fas fa-user icon"></i>
					<input class="input" required type="text" name="newUsername" placeholder="New Username" autocomplete="off">
				</td>
			</tr>
			<tr>
				<td align="center" >
					<i class="fas fa-lock icon"></i>
					<input class="input" required type="password" name="newPassword"  placeholder="New Password" autocomplete="off" id="InputNewPass">
					<p align="center"><input type="checkbox" onclick="shownewpass()">Show</p>
				</td>
			</tr>
			<tr>
				<td align="center" >
					<i class="fas fa-redo icon"></i>
					<input class="input" required type="password" name="newPasswordrepeat" placeholder="Repeat New Password" autocomplete="off" id="InputNewPassrepeat">
					<p align="center"><input type="checkbox" onclick="shownewpassrepeat()">Show</p>
				</td>
			</tr>
			<tr>
				<td align="center">
					<button class="Submit" type="submit" name="savechanges">SAVE CHANGES</button>
				</td>
			</tr>
		
		</table>
	</form></center>


<?php
if(isset($_GET['Error']))
{
	if($_GET['Error']==1)
     	echo "<script>alert('Some error occured with the database')</script>";

    if($_GET['Error']==2)
     	echo "<script>alert('New passwords do not match')</script>";

    if($_GET['Error']==3)
     	echo "<script>alert('Invalid Username and password')</script>"; 	 

}






?>