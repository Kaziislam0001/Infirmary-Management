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

		<td><a href="UT_FORM.php" class="active">
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
	<form name="UTform" action="UT_FORM.php" method="post">
    <table border="0" cellspacing="10" cellpadding="10" class="formtable">
    <th colspan="2" style="font-size: 30px;color: #004d80;border-bottom: 3px solid #004d80">URINE TEST FORM
    </th>

    <tr>
        <td align="center" colspan="2">
            <i class="fas fa-user icon"></i>
            <input placeholder="Name" class="input" type="text" name="Name" placeholder="" required
                   oninvalid="this.setCustomValidity('Please Enter the Name')" 
                   oninput="setCustomValidity('')" autocomplete="off">
        </td>
    </tr>

    <tr>
      <td align="center"> GRADE: <select class="inputNumber" name="Grade" value="" required oninvalid="this.setCustomValidity('Please Enter the Grade')" 
                    oninput="setCustomValidity('')"></p>
                    <option></option>
                    <option>7</option>
                    <option>8</option>      
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    </select>
      </td>

        <td align="center"> 
        	<input placeholder="Age" class="inputNumber" type="number" name="Age" min="1" required oninvalid="this.setCustomValidity('Please Enter the Age')" oninput="setCustomValidity('')" autocomplete="off">
        </td>
     </tr>

    <tr>
      <td align="center" colspan="2">   
      GENDER: <input type="radio" name="Gender" value="M" required>M
              <i style="font-size: 30px" class="fa fa-male"></i>

              <input type="radio" name="Gender" value="F" required>F
              <i style="font-size: 30px" class="fa fa-female"></i>
      </td>
    </tr>

    <tr>
      <td align="center" colspan="2">
      TEST RESULT: <input type="radio" name="Testresult" value="+" required>
                   <i style="font-size: 30px" class="fa fa-plus"></i>

                   <input type="radio" name="Testresult" value="-" required>
                   <i style="font-size: 30px" class="fa fa-minus"></i>

      </td>
    </tr>

    <tr><td align="center" colspan="2">
          <button class="Submit" type="submit" name="Submit" placeholder="">Save</button>
        </td>
     </tr>

    </table>
  </form></center>

<?php

include("DBCONN.php");

if($dbconn)
{

	if(isset($_POST['Submit']))
	{
        
        //getting the posted values
		$Name = $_POST['Name'];
		$Grade = $_POST['Grade'];
		$Age = $_POST['Age'];
		$Gender = $_POST['Gender'];
		$Testresult = $_POST['Testresult'];

        //query for entering the values into DB
		$entry = "INSERT INTO urine_test_register
		(slno, name, grade, age, gender, testresult, entryDate, entryTime)
		VALUE (slno,'$Name','$Grade','$Age', '$Gender', '$Testresult', CURDATE(), CURTIME())";

		$Q_Entry = mysqli_query($dbconn, $entry);

		if($Q_Entry)
			echo '<script>alert("SUCCESSFUL")</script>';	          
      
		else
			echo '<script>alert("UNSUSSESSFUL")</script>';
      
		echo mysqli_error($dbconn);
      
	}
}

		else      
		echo "CONNECTION FAILED </br>";       			
?>








</body>
</html>
	