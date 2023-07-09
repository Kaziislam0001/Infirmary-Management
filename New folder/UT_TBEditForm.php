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
  // assiginng the posted values
  if(isset($_POST['Edit']))
  {
    $SLNO=$_POST['SLNO'];
    $NAME=$_POST['NAME'];
    $AGE=$_POST['AGE'];
    $GRADE=$_POST['GRADE'];
    $GENDER=$_POST['GENDER'];
    $TESTRESULT=$_POST['TESTRESULT'];
    $URL=$_POST['URL'];
  }
?>

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


<center>
<form action="UTEditQuery.php" method="post">
  <table border="0" cellspacing="10" cellpadding="10" class="formtable">
    <th colspan="2" class="formHeading">URINE TEST FORM</th>

    <tr>
      <td align="center" colspan="2">

          <input class="input" type="text" name="Name" placeholder="Name" required 
          value="<?php echo $NAME; ?>" 
          oninvalid="this.setCustomValidity('Please Enter the Name')" 
          oninput="setCustomValidity('')">
      </td>
    </tr>

    <tr>
      <td align="center"> GRADE: 
        <select class="inputNumber" name="Grade" required oninvalid="this.setCustomValidity('Please Enter the Grade')" oninput="setCustomValidity('')">
    <option value="7"  <?php if($GRADE == '7' )echo "selected"; ?>>7</option>
    <option value="8"  <?php if($GRADE == '8' )echo "selected"; ?>>8</option>  
    <option value="9"  <?php if($GRADE == '9' )echo "selected"; ?>>9</option>
    <option value="10" <?php if($GRADE == '10')echo "selected"; ?>>10</option>
    <option value="11" <?php if($GRADE == '11')echo "selected"; ?>>11</option>
    <option value="12" <?php if($GRADE == '12')echo "selected"; ?>>12</option>
         </select>
      </td>
        <td align="center">AGE: 
          <input class="inputNumber" type="number" name="Age" min="1" required 
          value="<?php echo $AGE; ?>" 
          oninvalid="this.setCustomValidity('Please Enter the Age')" 
          oninput="setCustomValidity('')">
        </td>
     </tr>

    <tr>
      <td align="center" colspan="2">   
      GENDER: <input type="radio" name="Gender" value="M" required 
              <?php if($GENDER == "M") echo "checked"; ?>>M
              <i style="font-size: 30px" class="fa fa-male"></i>

              <input type="radio" name="Gender" value="F" required 
              <?php if($GENDER == "F") echo "checked"; ?>>F
              <i style="font-size: 30px" class="fa fa-female"></i>
      </td>
    </tr>

    <tr>
      <td align="center" colspan="2">
      TEST RESULT: <input type="radio" name="Testresult" value="+" required 
                   <?php if($TESTRESULT == "+") echo "checked"; ?>>
                   <i style="font-size: 30px" class="fa fa-plus"></i>

                   <input type="radio" name="Testresult" value="-" required
                   <?php if($TESTRESULT == "-") echo "checked"; ?>>
                   <i style="font-size: 30px" class="fa fa-minus"></i>

      </td>
    </tr>

    <tr>
      <td align="center" colspan="2">
          <button class="Submit" type="submit" name="Update">UPDATE</button>
      </td>
     </tr>
    </table>
            <input type="hidden" name="Slno" value="<?php echo $SLNO; ?>">
            <input type="hidden" name="Url" value="<?php echo $URL; ?>">
  </form></center>

</body>
</html>