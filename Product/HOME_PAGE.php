<?php
//this is to authenticate if the use is already logged in or not
include("LOGGEDIN_AUTH.php");

//After login a script to autodelete is run if the execution is successful $_GET['autodel'] will have a value of 'success'
if(isset($_GET['autodel']))
	if($_GET['autodel']=='success')
		echo "<script>alert('Automatically deleted old records')</script>";
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
		<td><a href="HOME_PAGE.php" class="active" >
			<i style="font-size: 30px" class="fa fa-stethoscope"></i>Home</a>
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

<!-- Form for entering the date which the user wants to view the reports of -->
<center><form action="HOME_PAGEDate.php" method="post">
	<input type="date" class="inputDate" required name="Date">
	<button type="submit" class="ShowTable" name="Submit">Show</button>
</form></center>




<!-- Form for generating pdf. If the user is on this page by default the date is the current date -->
<center><form action="REPORT_PDF.php" method="post">
	<button type="submit" class="btnPdf fas fa-file-pdf" name="Generatereportpdf"></button>
	<input type="hidden" name="DATE" value="<?php echo date("Y-m-d"); ?>">
</form></center>

<?php
include("DBCONN.php");
include("FUNCTIONS.php");


$TodaysDate=date("Y-m-d");

if ($dbconn) {
	$GeneralReport=generalreport($dbconn,$TodaysDate);
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
	error_reporting(0);
	//error reporting is turned off because when no data is entered the following function gives a runtime error

	//medcine report of the current date
    medicinereport($dbconn,$TodaysDate);
?>


</body>
</html>