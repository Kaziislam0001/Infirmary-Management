<?php
   include("FUNCTIONS.php");

	$Info=array('hostname'=>'localhost',
		          'username'=> 'root',
		          'password'=> '',
		          'dbname'=> 'Infirmary_Management');

	$dbconn= mysqli_connect($Info['hostname'],$Info['username'],$Info['password'],$Info['dbname']);

	if (isset($_POST['login']))
		{
			$Username=$_POST['Username'];
			$Password=crypt($_POST['Password'],"Q9*xy#2");

			$Q_username=mysqli_query($dbconn,"SELECT username FROM user");
            $DBusername=mysqli_fetch_assoc($Q_username);
			$Q_password=mysqli_query($dbconn,"SELECT password FROM user");
			$DBpassword=mysqli_fetch_assoc($Q_password);

               if ($Username==$DBusername['username'] and $Password==$DBpassword['password']) 
               {
               	    setcookie("LoginAuth","loggedin",time()+7200,"/");

               	    $A=deleteoldrecords($dbconn,'urine_test_register');
					$B=deleteoldrecords($dbconn,'opd_register');

					if($A==1 or $B==1)
	               	    header("location:HOME_PAGE.php?autodel=success");
               	    else
               	    	header("location:HOME_PAGE.php");
               	}
               else{
               	    header("location:LOGIN.php?valid=invalid");
               }
		}
?>