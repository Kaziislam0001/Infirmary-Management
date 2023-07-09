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

<?php
//Session variables do not change even if the page is refreshed or even if the user goes to another page. This gives me a way to display the same table after user has edited tha table or deleted it
session_start();
		if (isset($_POST['Search']))
		{
	     	$_SESSION['SearchName'] = $_POST['SearchName'];
	        $_SESSION['SearchGrade'] = $_POST['SearchGrade'];
	        $_SESSION['SearchSickness'] = $_POST['SearchSickness'];
	        $_SESSION['SearchMedicine'] = $_POST['SearchMedicine'];
	        if(isset($_POST['SearchGender']))
		        $_SESSION['SearchGender'] = $_POST['SearchGender'];
		    else
		    	$_SESSION['SearchGender'] = '';

	       $_SESSION['FromDate'] = $_POST['FromDate'];

	        if (isset($_POST['ToDate'])) 
            	$_SESSION['ToDate'] = $_POST['ToDate'];
            else
                $_SESSION['ToDate'] ='';
	    }
?>

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




<?php
include("DBCONN.php");
include("FUNCTIONS.php");

$FieldNames=array('name','entryDate','entryDate','grade','gender','sickness','medicine');
$Input=array(
	        $_SESSION['SearchName'],$_SESSION['FromDate'],$_SESSION['ToDate'],
	        $_SESSION['SearchGrade'],$_SESSION['SearchGender'],
	        $_SESSION['SearchSickness'],$_SESSION['SearchMedicine']);


$SQuery=SearchQuery($dbconn,'opd_register',$FieldNames,$Input);
//echo $SQuery;
?>

<center><form align="center" method="post" action="SEARCHOPD_RES_PDF.php">
		    <button type="submit" name="Generatepdf" class="fa fas fa-file-pdf btnPdf"></button>
		    <input class="input" type="text" name="PdfTitle" placeholder="Pdf File Name" required>
		    <input class="input" type="text" name="Heading" placeholder="Pdf Heading" required>
		    <input type="hidden" name="Query" value="<?php echo $SQuery;  ?>">
</form></center>


<br>
<table class="Table" cellspacing="5px" align="center" border="0">
	<tr>
		<th colspan="13"><h1 align="center">OPD Search Results</h1></th>
	</tr>
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
		<th colspan="2" style="padding: 30px 0px;"></th>
		</tr>

<?php 
	displayTB($dbconn,'SEARCHOPD_RES.php',$SQuery,'OPD');
?>

</body>
</html>

