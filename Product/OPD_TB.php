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
		<td><a href="HOME_PAGE.php" class="Home">
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

	    <td><a href="OPD_TB.php" class="active">
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




<table class="Table" cellspacing="5px" align="center" border="0">
		<tr>
		<th class="th">NO</th>
		<th class="th">NAME</th>
		<th class="th">GRADE</th>
		<th class="th">AGE</th>
		<th class="th">GENDER</th>
		<th class="th">SICKNESS</th>
		<th class="th">MEDICINE</th>
		<th class="th">Qty</th>
		<th class="th">DATE</th>
		<th class="th">TIME</th>
     	<form align="center" method="post" action="OPD_PDF.php">
		<th colspan="2">
		   <button type="submit" name="GenerateOPDpdf" class="fas fa-file-pdf btnPdf"></button>
       </form>
     </th>
		</tr>
		
<?php
include("DBCONN.php");
include("FUNCTIONS.php");

$TodaysDate=date("Y-m-d");

	if ($dbconn) 
	{
		$Query="SELECT * FROM opd_register WHERE entryDate='$TodaysDate' ORDER BY entryTime DESC";
	    displayTB($dbconn,'OPD_TB.php',$Query,'OPD');
	}

	else
		echo "Connection Error:".mysqli_error($dbconn);

?>

</body>
</html>