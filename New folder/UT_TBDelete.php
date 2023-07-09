<?php
include("LOGGEDIN_AUTH.php");
?>
<?php

include("DBCONN.php");

if(isset($_POST['Delete']))
   {
   	    $Slno=$_POST['Slno'];
		$deleteEntry="DELETE FROM urine_test_register WHERE slno='$Slno'";
		$Q_delete=mysqli_query($dbconn,$deleteEntry);

		if ($Q_delete){
			echo "<script>alert('DELETED SUCCESSFULLY')</script>";
			header("location:".$_POST['URL']);
			
		}

		else{
			echo "<script>alert('UNSUCCESSFULLY IN DELETING')</script>";
			header("location:".$_POST['URL']);
		}
	}
		 echo mysqli_error($dbconn);
?>