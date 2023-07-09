
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

		<td><a href="SEARCHUT.php" class="active">
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

<br><br><br><br>


<center>
<form action="SEARCHUT_RES.php" method="post">
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
                    <option>7</option>
                    <option>8</option>      
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    </select>
		</td>
	</tr> 
	<tr>
		<td width="50%" align="center">
			       <input type="radio" name="SearchTestresult" value="+">
                   <i style="font-size: 30px" class="fa fa-plus"></i>

                   <input type="radio" name="SearchTestresult" value="-">
                   <i style="font-size: 30px" class="fa fa-minus"></i>
		</td>
		<td width="50%" align="center">
			  <input type="radio" name="SearchGender" value="M" >M
              <i style="font-size: 30px" class="fa fa-male"></i>

              <input type="radio" name="SearchGender" value="F">F
              <i style="font-size: 30px" class="fa fa-female"></i>
		</td>
	</tr> 
	<tr colspan="2">
		<td align="center">
			From<i class="fas fa-calendar icon"></i>
			<input class="inputDate" value="<?php echo date('Y-m-d');?>" type="date" name="FromDate" >
			<p style="color: red"></p>
		</td>
	
		<td colspan="2" align="center">
			To<i class="fas fa-calendar icon"></i>
			<input class="inputDate" type="date" name="ToDate" >
			<p style="color: red"></p>
		</td>
	</tr> 
</table>
</form>
</center>

</body>
</html>