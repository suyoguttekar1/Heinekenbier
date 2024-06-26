<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if ($_SESSION["valid_login"] != 'YES' ) {
			header("Location: default.php");
			exit();
	}
	include_once 'header.php';
	include_once("includes/config.php");
	
	$target_path = "c:\\temp\\";

	//$db_file_path = "http://pruprestige.redant.my/doc/";
	//$os_file_path = "doc/";
	//$photo_file_path = "/home/pruprestige/public_html/doc/";

extract($_POST);
?>
<?php 
	$csv_mimetypes = array(
		'text/csv',
		'text/plain',
		'application/csv',
		'text/comma-separated-values',
		'application/excel',
		'application/vnd.ms-excel',
		'application/vnd.msexcel',
		'text/anytext',
		'application/octet-stream',
		'application/txt',
	);
		
	if($_FILES['user_upload']['error']==0) {
		if (in_array($_FILES['user_upload']['type'], $csv_mimetypes)) {
		}
		else {
			echo "Not a csv file format for upload!";
			exit;		
		}

		$file_name   = "employee.csv";
		//$target_path = $os_file_path; //"client_html/image/"; 
		$target_path = $target_path . $file_name;
		//$target_dbpath = $db_file_path; // "http://rwdmx.redant.my/image/";
		//$target_dbpath = $target_dbpath . $file_name;
		
		//copy existing to backup
		$currentfile = "c:\\temp\\employee.csv";
		$backupfile = $currentfile."_".time();
		if (!copy($currentfile, $backupfile)) {
			//echo "failed to copy  ...\n";
		}
			
		//upload file
		if(move_uploaded_file($_FILES['user_upload']['tmp_name'], $target_path)) 
		 {
		 } 
		 else {
			echo "Sorry, problem uploading your file. ";
			exit;
		 }
	}
	else {
		echo "Empty csv file!";
		$target_path = null;
		$target_dbpath = null;
		exit;
	}
	
	//remove old data
	$SQL="
	DELETE FROM tmp_emp";
	//$params = array($drink_category, $drink_name, $drink_pint, $display_seq, $target_dbpath);
	$result = sqlsrv_query($con, $SQL); //, $params);
	
	if( !$result ) {
     //echo "Connection could not be established.<br />";
		echo "Error deleting temporary employee table";
		exit;
	}else{
		//echo "Drink success added";
	}
	sqlsrv_free_stmt($result);
	
	exec('icacls "c:\\temp\\employee.csv" /q /c /reset'); //inherited ACL's from parent 
	exec('c:\\temp\\sfk.exe addcr c:\\temp\\employee.csv -norec'); //change to Windows carriage return
	$sql = "{call load_employee_csv}";  //execute mssql stored procedure
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
