<?php
include("LOGGEDIN_AUTH.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.1-web\css\all.css">
	<link rel="stylesheet" type="text/css" href="StyleFiles.css">
</head>

<body>

<!-- Navigation Bar (the class active shows the current page the user is on) -->
<center>
<table border="0" cellspacing="10px" class="tabs">
	<tr>
		<td><a href="HOME_PAGE.php" >
			<i style="font-size: 30px" class="fas fa-reply"></i>Home</a>
		</td>

	    <td style="color: white;font-size: 40px">|</td>

		<td><a href="UT_FORM.php">
			<i style="font-size: 30px;" class="fa fa-edit"></i>Urine Test Form</a>
		</td> 

		<td><a href="UT_TB.php" >
			<i style="font-size: 30px" class="fa fa-list-alt"></i>Urine Test Table</a>
		</td> 

		<td><a href="SEARCHUT.php" class="Search">
			<i style="font-size: 30px" class="fa fa-search"></i>Urine tests</a>
		</td>

		<td style="color: white;font-size: 40px">|</td>


	    <td><a href="OPD_FORM.php">
	    	<i style="font-size: 30px" class="fa fa-edit"></i>OPD Form</a>
	    </td>

	    <td><a href="OPD_TB.php">
	    	<i style="font-size: 30px" class="fa fa-list-alt"></i>OPD Table</a>
	    </td>

	    <td><a href="SEARCHOPD.php" class="Search">
	    	<i style="font-size: 30px" class="fa fa-search"></i>OPD</a>
	    </td>

	    <td><a href="LOGOUT.php" class="logout">
	    	<i style="font-size: 30px" class="fa fa-sign-out-alt"></i>LOG OUT</a>
	    </td>

    </tr>
</table>
</center>


<!-- Form for generating pdf-->
<center><form action="REPORT_PDF.php" method="post">
	<button type="submit" class="btnPdf fas fa-file-pdf" name="Generatereportpdf"></button>
	<input type="hidden" name="DATE" value="<?php echo $_POST['Date']; ?>">
	<!-- the posted date which is the date the user is on will be sent -->

</form></center>

<?php
include("DBCONN.php");
include("FUNCTIONS.php");
 
$TodaysDate=date("Y-m-d");

if ($dbconn) {

	$GeneralReport=generalreport($dbconn,$_POST['Date']);
}

else
    echo "Connection Error:".mysqli_error($dbconn);

?>

<center><table class='Table' style='width: 600px;height: 150px'>
	<th class='th' width='33%'>URINE TESTS</th>
    <th class='th' width='33%'>STAFF OPDs</th>
    <th class='th' width='34%'>STUDENTS OPDs</th>

	<tr>
		<td class='row D' align='center'><?php echo $GeneralReport['Total UT']; ?></td>
			
		<td class='row B' align='center'><?php echo $GeneralReport['Total staffOPD']; ?></td>

		<td class='row C' align='center'><?php echo $GeneralReport['Total studentOPD']; ?></td>
	</tr>

</table></center>

<?php
//medcine report of the date the user has entered
	medicinereport($dbconn,$_POST['Date']);
?>


</body>
</html>