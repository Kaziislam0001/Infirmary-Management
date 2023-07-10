<?php

$Info=array('hostname'=>'localhost',
	          'username'=> 'root',
	          'password'=> '',
	          'dbname'=> 'Infirmary_Management');

$dbconn= mysqli_connect($Info['hostname'],
						$Info['username'],
						$Info['password'],
						$Info['dbname']);
  	  include("Datalist.php");
     
     $Grade = array('6','7','8','9','10','11','12','NA');
$CurDate=date("Y-m-d");

if ($dbconn){



	for ($i=0; $i < 3; $i++) 
	{ 

    $A=rand(0,24);
    $B=rand(0,20);
    $Age=rand(1,18);
    $G=rand(0,7);
    $med=rand(1,7);

$entryOPD = "INSERT INTO opd_register 
	      (slno, name,   grade, age, gender, sickness, medicine,   medq, entryDate, entryTime)
	VALUE (slno,'Shaam','10',   '15','M',    'Fever',  'T.Cellin', '3',  '2017-07-21','15:20:40')";

$entryUT = "INSERT INTO urine_test_register
		      (slno, name,   grade, age,   gender, testresult, entryDate,  entryTime)
		VALUE (slno, 'Shaam','10',  '15', 'M',     '+','       2017-07-21','15:20:40')";


	mysqli_query($dbconn,$entryOPD);
	mysqli_query($dbconn,$entryUT);


	echo mysqli_error($dbconn);

	}
		echo mysqli_error($dbconn);

}
?>