<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "Infirmary_Management";

	$dbconn = mysqli_connect($hostname,$username,$password);

	if($dbconn==true)
	{

		$createDB = "CREATE DATABASE ".$dbName;
		$Qcrt_DB = mysqli_query($dbconn, $createDB);//creating the database for infirmary
		mysqli_select_db($dbconn,$dbName);
		
		if($createDB)
			echo "created</br>";
		else
			echo "not created</br>";

		$create_tbGR = "CREATE TABLE $databaseName.opd_register(
			 slno INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 name VARCHAR(30) NOT NULL, 
			 grade VARCHAR(2) NOT NULL,
			 age INT(2) NOT NULL, 
			 gender CHAR(1) NOT NULL, 
			 sickness VARCHAR(40) NOT NULL, 
			 medicine VARCHAR(20) NOT NULL, 
			 medq INT(5) NOT NULL,
			 entryDate DATE NOT NULL,
			 entryTime TIME NOT NULL)";
			 //grade is varchar because for staff there is a NA option
		
		//$Qcrt_tbGR = 
		mysqli_query($dbconn, $create_tbGR);

		
		//creating table of urint test register
		$create_tbUT = "CREATE TABLE $databaseName.Urine_Test_Register(
			 slno INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 name VARCHAR(30) NOT NULL, 
			 grade VARCHAR(2) NOT NULL, 
			 age INT(2) NOT NULL, 
			 gender CHAR(1) NOT NULL, 
			 testresult CHAR(1) NOT NULL, 
			 entryDate DATE NOT NULL,
			 entryTime TIME NOT NULL)";
	 
		//$Qcrt_tbUT = 
		mysqli_query($dbconn,$create_tbUT);

	$create_tbuser = "CREATE TABLE $databaseName.user(username VARCHAR(40) NOT NULL , password VARCHAR(100) NOT NULL)";

	mysqli_query($dbconn,$create_tbuser);

    $username='abcd';//default username
    $pass="1234";//default password
	$password= crypt($pass,"Q9*xy#2");
	$Q_insert= "INSERT INTO user (username, password) VALUE ('$username','$password')";

		mysqli_query($dbconn,$Q_insert);
		echo mysqli_error($dbconn);
	}
	else
		echo "CONNECTION FAILED </br>";

?>