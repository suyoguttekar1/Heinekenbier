<?php
	session_start(); 
	$_SESSION["active_member_id"] 		= "";
	$_SESSION["active_login_name"] 		= "";
	$_SESSION["active_personal_name"]	= "";
	$_SESSION["active_currency"]		= "";
	$_SESSION["valid_login"]			= "";
	$_SESSION = array();
	
	$session_id = session_id();
	
	session_unset();
	session_destroy();
	$_SESSION = array();
	header ("Location: default.php");
?>