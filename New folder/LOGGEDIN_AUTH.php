<?php
// when the user is logged in the cookie with the name 'LoginAuth' is set to 'logged in'

//if the cookie value is not 'loggedin' it means the user is not logged in so the user is redirected automatically to the login page
if($_COOKIE['LoginAuth']!='loggedin')
{
	header("location:LOGIN.php");
}
?>