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

	    <td><a href="SEARCHOPD.php" class="active">
	    	<i style="font-size: 30px" class="fa fa-search"></i>OPD</a>
	    </td>
	    <td><a href="LOGOUT.php" class="logout">
	    	<i style="font-size: 30px" class="fa fa-sign-out-alt"></i>LOG OUT</a>
	    </td>

    </tr>
</table>
</center>



<br><br><br><br>

<center>
<form action="SEARCHOPD_RES.php" method="post">
<table border="0" height="300px" width="700px">
	<tr height="0px" colspan="2">
		<td colspan="2"  align="center">
			<input class="searchName" type="text" name="SearchName" placeholder="Enter Name" autocomplete="off">
			<button style="	font-size: 20px;" type="submit" name="Search" class="fa fa-search btnsearch"></button>
		</td>		
	</tr>
	<tr>
		<td colspan="2" align="center">
			GRADE: <select class="inputNumber" name="SearchGrade" value=""></p>
                    <option></option>
                     <option>NA</option>
                    <option>7</option>
                    <option>8</option>      
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    </select>
		</td>
	</tr> 
	<tr colspan="2">
		<td colspan="2" align="center">
		    <i class="fas fa-head-side-cough icon"></i>
            <input class="input" type="text" name="SearchSickness" list="Common Sickness" 
            placeholder="Sickness">

    <datalist id="Common Sickness" >
	  	<?php
	  	     include("Datalist.php");
	  	    foreach ($ComSickness as $sicknessname) {
	        echo "<option value='".$sicknessname."'>";
	  	    }
	 	?>
    </datalist>
		</td>
	</tr>
	<tr >
		<td colspan="2" align="center">
		    <i class="fas fa-pills icon"></i>
            <input class="input" type="text" name="SearchMedicine" list="Common Medicine" 
            placeholder="Medicine">

    <datalist id="Common Medicine">
	  	<?php
	  	    foreach ($ComMed as $medname) {
	        echo "<option value='".$medname."'>";
	  	    }
	 	?>
    </datalist>
		</td>
	<tr>
		<td colspan="2" align="center">
			  <input type="radio" name="SearchGender" value="M" >M
              <i style="font-size: 30px" class="fas fa-male"></i>

              <input type="radio" name="SearchGender" value="F">F
              <i style="font-size: 30px" class="fas fa-female"></i>
		</td>
	</tr> 
	<tr colspan="2">
		<td align="center">
			From<i class="fas fa-calendar icon"></i>
			<input class="inputDate" value="<?php echo date('Y-m-d');?>"  type="date" name="FromDate" >
			<p style="color: red"></p>
		</td>
	
		<td colspan="2" align="center">
			To<i class="fas fa-calendar icon"></i>
			<input class="inputDate" type="date" name="ToDate" >
			<p style="color: red"></p>
		</td>
</table></form></center>
</body>
</html>
