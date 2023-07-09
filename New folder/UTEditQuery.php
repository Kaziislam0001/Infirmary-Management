<?php
include("LOGGEDIN_AUTH.php");
?>
<?php
include("DBCONN.php");

if ($dbconn) 
{
  if(isset($_POST['Update']))
  {
    $Slno=$_POST['Slno'];
    $Name=$_POST['Name'];
    $Grade=$_POST['Grade'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Testresult=$_POST['Testresult'];
        $Q_update="UPDATE urine_test_register SET name='$Name', grade='$Grade', age='$Age', 
        gender='$Gender', testresult='$Testresult' WHERE slno='$Slno'";
        $updatequery=mysqli_query($dbconn,$Q_update);
        if ($updatequery)
      echo "<script>alert('UPDATED SUCCESSFULLY')</script>";

    else
      echo "<script>alert('UNSUCCESSFULLY IN UPDATING')</script>";

        header("location:".$_POST['Url']);
      echo mysqli_error($dbconn);
  }

}
  echo mysqli_error($dbconn);


?>