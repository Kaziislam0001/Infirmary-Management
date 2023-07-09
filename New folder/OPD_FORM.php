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


	    <td><a href="OPD_FORM.php" class="active">
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





<center>
<form style="text-align: center;" name="OPDform" action="OPD_FORM.php"
 class="formtable" method="post">

<table class="formtable" border="0" cellspacing="8" cellpadding="10" width="500px">
	<th colspan="2" class="formHeading"> OPD FORM</th>
	<tr>
		<td align="center" colspan="2">
			<i class="fas fa-user icon"></i>
			<input type="text" name="Name" required class="input" placeholder="Enter Name" 
			              oninvalid="this.setCustomValidity('Please Enter the Name')" 
			              oninput="setCustomValidity('')" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td align="center" width="50%">
			GRADE: <select style="text-align: center" name="Grade" required class="inputNumber"
			              oninvalid="this.setCustomValidity('Please Enter the Grade')" 
			              oninput="setCustomValidity('')"></p>
			        <option></option>
			        <option>NA</option>
			        <option>6</option>
					<option>7</option>
					<option>8</option>			
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
				  </select>
		</td>
		<td align="center" width="50%">
			<input type="number" name="Age" min="1" required class="inputNumber" placeholder="Age" 
			           oninvalid="this.setCustomValidity('Please Enter the Age')" 
			           oninput="setCustomValidity('')" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input   type="radio" name="Gender" value="M" required>M
              <i style="font-size: 40px" class="fa fa-male"></i>

              <input  type="radio" name="Gender" value="F" required>F
              <i style="font-size: 40px" class="fa fa-female"></i>
		</td>
	</tr>	

	<tr>
		<td align="center" colspan="2">
			<i class="fas fa-head-side-cough icon"></i>
            <input list="Common Sickness" type="text" name="Sickness" required class="input" Autocomplete='off' placeholder="Sickness"  oninvalid="this.setCustomValidity('Please Enter the Sickness')" oninput="setCustomValidity('')">
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
	<tr>
		<td align="center" colspan="2">
			<i class="fas fa-pills icon"></i>
			 <input type="text" name="Medicine" required class="input" placeholder="Medicine" Autocomplete='off' list="Common Medicine" oninvalid="this.setCustomValidity('Please Enter the Medicine pescribed')" oninput="setCustomValidity('')">

  <datalist id="Common Medicine" >
  	<?php
  	    include("Datalist.php");
  	    foreach ($ComMed as $medname) {
        echo "<option value='".$medname."'>";
  	    }
 	?>
  </datalist>
<input type="number" name="Medq" min="1" required class="inputNumber" placeholder="Quantity"    
                oninvalid="this.setCustomValidity('Please Enter the Quantity')" 
			    oninput="setCustomValidity('')" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<button class="Submit" type="submit" name="submit">SAVE</button>
		</td>
	</tr>	

</table></center>


<?php
include("DBCONN.php");

	if(isset($_POST['submit'])){
				
			$Name = $_POST['Name'];
			$Grade = $_POST['Grade'];
			$Age = $_POST['Age'];
			$Gender = $_POST['Gender'];
			$Sickness = $_POST['Sickness'];
			$MedQty = $_POST['Medq'];
			$Medicine =$_POST['Medicine'];


			$entry = "INSERT INTO opd_register
				(slno, name, grade, age, gender, sickness, medicine, medq, entryDate, entryTime)
          VALUE (slno,'$Name','$Grade','$Age','$Gender','$Sickness','$Medicine','$MedQty',CURDATE(),CURTIME())";

			$Q_Entry = mysqli_query($dbconn, $entry); 

			
			if($Q_Entry)
				echo '<script>alert("SUCCESSFUL")</script>';
			
			else     
				echo '<script>alert("UNSUSSESSFUL")</script>';
			
			echo mysqli_error($dbconn);

				}
					
?>
	
	



</body>
</html>