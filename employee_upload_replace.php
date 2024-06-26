<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if ($_SESSION["valid_login"] != 'YES' ) {
			header("Location: default.php");
			exit();
	}
	include_once("includes/config.php");
?>
<?php 
	$sql = "{call update_employee_csv}";  //execute mssql stored procedure
	$result = sqlsrv_query($con, $sql);
	
	if( !$result ) {
     //echo "Connection could not be established.<br />";
		echo "Error execute stored procedure";
		exit;
	}else{
		echo "Employee successfully uploaded";
	}
	sqlsrv_free_stmt($result);
	sqlsrv_close($con);
?>
