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
	if(isset($_POST['Edit']))
	{
		$SLNO=$_POST['SLNO'];
		$NAME=$_POST['NAME'];
		$AGE=$_POST['AGE'];
		$GRADE=$_POST['GRADE'];
		$GENDER=$_POST['GENDER'];
		$SICKNESS=$_POST['SICKNESS'];
		$MEDICINE=$_POST['MEDICINE'];
		$MEDQTY=$_POST['MEDQ'];
        $URL=$_POST['URL'];
	}
?>
<!-- Navigation Bar (the class active shows the current page the user is on) -->
<center>
<table border="0" cellspacing="10px" class="tabs">
  <tr>
    <td><a href="HOME_PAGE.php" >
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



<br>
<center>
<form action="OPDEditQuery.php" name="OPDform" method="post">

<table class="formtable" border="0" cellspacing="8" cellpadding="10" width="500px">
	<th colspan="2" class="formHeading"> OPD TEST FORM</th>
	<tr>
		<td align="center" colspan="2">
			<i class="fas fa-user icon"></i>
			<input type="text" name="Name" required class="input" 
			              value="<?php echo $NAME; ?>"
			              oninvalid="this.setCustomValidity('Please Enter the Name')" 
			              oninput="setCustomValidity('')">
		</td>
	</tr>
	<tr>
		<td align="center" width="50%">
			GRADE: <select name="Grade" value="" required class="inputNumber" 
			              oninvalid="this.setCustomValidity('Please Enter the Grade')" 
			              oninput="setCustomValidity('')"></p>
			        
			<option value="NA" <?php if($GRADE == 'NA') echo "selected"; ?>>NA</option>
			<option value="7"  <?php if($GRADE == '7' ) echo "selected"; ?>>7</option>
			<option value="8"  <?php if($GRADE == '8 ') echo "selected"; ?>>8</option>	
			<option value="9"  <?php if($GRADE == '9' ) echo "selected"; ?>>9</option>
			<option value="10" <?php if($GRADE == '10') echo "selected"; ?>>10</option>
			<option value="11" <?php if($GRADE == '11') echo "selected"; ?>>11</option>
			<option value="12" <?php if($GRADE == '12') echo "selected"; ?>>12</option>
				 </select>
		</td>
		<td align="center" width="50%">
			AGE: <input type="number" name="Age" min="1" required class="inputNumber" autocomplete="off"
					   value="<?php echo $AGE; ?>"
			           oninvalid="this.setCustomValidity('Please Enter the Age')" 
			           oninput="setCustomValidity('')" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			  <input type="radio" name="Gender" value="M" required
		      <?php if($GENDER == "M")echo "checked"; ?>>M
              <i style="font-size: 30px" class="fa fa-male"></i>

              <input type="radio" name="Gender" value="F" required 
                    <?php if($GENDER == "F")echo "checked"; ?>>F
              <i style="font-size: 30px" class="fa fa-female"></i>
		</td>
	</tr>	
	
	<tr>
		<td align="center" colspan="2">
				<i class="fas fa-head-side-cough icon"></i>
			 <input type="text" name="Sickness" required class="input" 
						  value="<?php echo $SICKNESS; ?>"
			              oninvalid="this.setCustomValidity('Please Enter the Sickness')" 
			              oninput="setCustomValidity('')">
		</td>
	</tr>	
	<tr>
		<td align="center" colspan="2">
			<i class="fas fa-pills icon"></i>
			<input type="text" name="Medicine" required class="input" Autocomplete='on' list="Common Medicine" value="<?php echo $MEDICINE; ?>"
			              oninvalid="this.setCustomValidity('Please Enter the Medicine pescribed')" 
			              oninput="setCustomValidity('')">

  <datalist id="Common Medicine" >
  	<?php
        include("Datalist.php");
  	    foreach ($ComMed as $medname) {
        echo "<option value='".$medname."'>";
  	    }
 	?>
  </datalist>
<input type="number" name="Medq" min="1" required class="inputNumber" placeholder="Quantity"  
                value="<?php echo $MEDQTY; ?>"  
                oninvalid="this.setCustomValidity('Please Enter the Quantity')" 
			    oninput="setCustomValidity('')" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<button class="Submit" type="submit" name="Update">UPDATE</button>
		</td>
	</tr>	
</table>
					<input type="hidden" name="Slno" value="<?php echo $SLNO; ?>">
                    <input type="hidden" name="Url" value="<?php echo $URL; ?>">
</form></center>
