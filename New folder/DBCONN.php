<?php
$Info=array('hostname'=>'localhost',
		          'username'=> 'root',
		          'password'=> '',
		          'dbname'=> 'Infirmary_Management');

	$dbconn= mysqli_connect($Info['hostname'],$Info['username'],$Info['password'],$Info['dbname']);


?>