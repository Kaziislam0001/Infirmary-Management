<?php


	$Info=array('hostname'=>'localhost',
		          'username'=> 'root',
		          'password'=> '',
		          'dbname'=> 'Infirmary_Management');

	$dbconn= mysqli_connect($Info['hostname'],$Info['username'],$Info['password'],$Info['dbname']);

if (isset($_POST['savechanges'])) 
	{
		    $CurUsername=$_POST['curUsername'];
			$CurPassword=crypt($_POST['curPassword'],"Q9*xy#2");

			$NewUsername=$_POST['newUsername'];
			$NewPassword=crypt($_POST['newPassword'],"Q9*xy#2");
			$NewPasswordrepeat=crypt($_POST['newPasswordrepeat'],"Q9*xy#2");

			$Q_username=mysqli_query($dbconn,"SELECT username FROM user");
            $DBusername=mysqli_fetch_assoc($Q_username);

			$Q_password=mysqli_query($dbconn,"SELECT password FROM user");
			$DBpassword=mysqli_fetch_assoc($Q_password);

		    if ($CurUsername==$DBusername['username'] and $CurPassword==$DBpassword['password']) 
		        {
               		if ($NewPassword==$NewPasswordrepeat) 
               		{
	               		$Q_save=mysqli_query($dbconn,"UPDATE user SET username='$NewUsername', password='$NewPassword' WHERE username='$CurUsername' AND password='$CurPassword'");

	                         echo mysqli_error($dbconn);

		               		if ($Q_save)
		               			header("location:LOGIN.php?change=success");
	                 		else
		               			header("location:CHANGE.php?Error=1");
		               			//some problem with sql
               		}
               		else
               			header("location:CHANGE.php?Error=2");
               			//New password and repeated new password do not match
               }
	        else
		       	header("location:CHANGE.php?Error=3");
		       	//current password and user name do not match
	}


?>