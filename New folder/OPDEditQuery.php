<?php
include("LOGGEDIN_AUTH.php");
?>
<?php

include("DBCONN.php");

if ($dbconn) {
	if(isset($_POST['Update']))
	{
        $Slno=$_POST['Slno'];
		$Name=$_POST['Name'];
		$Grade=$_POST['Grade'];
		$Age=$_POST['Age'];
		$Gender=$_POST['Gender'];
		$Sickness=$_POST['Sickness'];
		$Medicine=$_POST['Medicine'];
		$MedQty=$_POST['Medq'];
        
        $Q_update="UPDATE opd_register SET name='$Name', grade='$Grade', age='$Age', 
        gender='$Gender', sickness='$Sickness', 
        medicine='$Medicine', medq='$MedQty' WHERE slno='$Slno'";
        
        mysqli_query($dbconn,$Q_update);
        header("location:".$_POST['Url']);

        echo mysqli_error($dbconn);
      
	}
}
  echo mysqli_error($dbconn);


?>