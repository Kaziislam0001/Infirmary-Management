


<?php 
    $Grade = array('6','7','8','9','10','11','12','NA');
  
?>

<?php
set_time_limit(5000);
date_default_timezone_set('Asia/Kolkata');

$Info=array('hostname'=>'localhost',
	          'username'=> 'root',
	          'password'=> '',
	          'dbname'=> 'Infirmary_Management');

$dbconn= mysqli_connect($Info['hostname'],
						$Info['username'],
						$Info['password'],
						$Info['dbname']);

include("Datalist.php");
include("Names.php");

$CurDate=date("Y-m-d");
$CurTime=date("H:i");


function randomDate()
{
	//$Y= rand(2019,2020);

	$Y=2021;
	$M= rand(00,12);
	$D= rand(00,30);
    $Date=$Y.'-'.$M.'-'.$D;
	return $Date;
}

function randomTime()
{
	$CurHr=intval(date("H"));
	$CurMin=intval(date("i"));
	$Time='';

	$H= rand(00,24);
	$Min= rand(00,60);
	$S= rand(00,60);

	if ($H<=$CurHr and $Min<=$CurMin) {
		$Time=$H.':'.$Min.':'.$S;
	}
    
	return $Time;
}

function age($Grade)

{
    if ($Grade=='NA')
    	$Age=rand(25,40);
    if ($Grade=='6')
    	$Age=rand(11,13);
    if ($Grade=='7')
    	$Age=rand(12,13);
    if ($Grade=='8')
    	$Age=rand(13,14);
    if ($Grade=='9')
    	$Age=rand(13,15);
    if ($Grade=='10')
    	$Age=rand(14,16);
    if ($Grade=='11')
    	$Age=rand(16,17);
    if ($Grade=='12')
    	$Age=rand(16,18);

	  return $Age;
}


$opd=100000;
$opdtoday=10;

if ($dbconn){

$c1=0; $c2=0;
	for ($i=0; $i<$opd ; $i++) 
	{
	    $Grade1=$Grade[rand(0,7)];
	    $Age1=age($Grade1);
	 
	    $ComSickness1=$ComSickness[rand(0,24)];
	    $ComMed1=$ComMed[rand(0,20)];
	    $r=rand(0,100);
	    $Name1=$Name[$r][0];
	    $Gender1=$Name[$r][1];
	    $Mq=rand(1,7);
	    $Date=randomDate();
	    $Time=randomTime();

	    $query= "INSERT INTO opd_register 
		(slno, name, grade, age, gender, sickness, medicine, medq, entryDate, entryTime)
		VALUE 
	    (slno,'$Name1','$Grade1','$Age1','$Gender1','$ComSickness1','$ComMed1','$Mq','$Date','$Time')";
		$Q=mysqli_query($dbconn,$query);
	    if($Q)
	    	$c1=1;
	}
	if($c1==1)
    	echo "OPD Entry successul";

    //Todays date
	for ($i=0; $i <$opdtoday; $i++) 
	{
	    $Grade1=$Grade[rand(0,7)];
	    $Age1=age($Grade1);

	    $ComSickness1=$ComSickness[rand(0,24)];
	    $ComMed1=$ComMed[rand(0,20)];
	    $r=rand(0,100);
	    $Name1=$Name[$r][0];
	    $Gender1=$Name[$r][1];
	    $Mq=rand(1,7);

	    $query= "INSERT INTO opd_register 
		(slno, name, grade, age, gender, sickness, medicine, medq, entryDate, entryTime)
		VALUE 
	    (slno,'$Name1','$Grade1','$Age1','$Gender1','$ComSickness1','$ComMed1','$Mq',CURDATE(),CURTIME())";
		$Q=mysqli_query($dbconn,$query);

		if($Q)
				$c2=1;
}
	if($c2==1)
    	echo "OPD todays Entry successul";


}

?>