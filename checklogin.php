<?php 
	if(!isset($_SESSION)){
	session_start();
	}
	include("includes/config.php");
	include("includes/func.php");
	
	//debugstop($statusCode);

	$ladmin_login_name	= trim(quote_smart($_POST['txt_username'])); 
	$ladmin_login_password = trim(quote_smart($_POST['txt_password']));
	//$ladmin_captcha = trim(quote_smart($_POST['txt_captcha']));
	
	//if(isset($_POST["txt_captcha"])&&$_POST["txt_captcha"]!=""&&$_SESSION["code"]==$_POST["txt_captcha"])
	//{
		$checkLoginStatus = db_ChkMemberLogin($ladmin_login_name, $ladmin_login_password, $lret_ValArray);
		//$checkLoginStatus = 1; //##########3
		if ($checkLoginStatus == 1) {
			session_unset();
			session_destroy();
			session_start();
			session_regenerate_id(true);

				$member_id 		= $lret_ValArray['USER_ID'];
				$login_name 	= $lret_ValArray['EMAIL_ADDRESS'];
				$login_password = $lret_ValArray['USER_PASSWORD'];
				$personal_name	= $lret_ValArray['FIRST_NAME'];
				$status_id		= $lret_ValArray['USER_STATUS'];
				$last_login		= $lret_ValArray['LAST_LOGIN'];
				//$created_date	= $lret_ValArray['CREATED_DATE'][0];
				//$created_by		= $lret_ValArray['CREATED_BY'][0];
				//$modified_date	= $lret_ValArray['MODIFIED_DATE'][0];
				//$modified_by	= $lret_ValArray['MODIFIED_BY'][0];
				$admin_flag		= $lret_ValArray['ADMIN_FLAG'];
				$default_currency	= $lret_ValArray['DEFAULT_CURRENCY'];

				$_SESSION["active_member_id"] 	 = $member_id;
				$_SESSION["active_login_name"] 	 = $login_name;
				$_SESSION["active_personal_name"]= $personal_name;
				$_SESSION["active_currency"]	 = $default_currency;
				$_SESSION["valid_login"]	     = 'YES';
				$_SESSION["product"]	     	 = 'ALL';
				$_SESSION["date_range"]	     	 = 'YES';
				$_SESSION["admin"]	     	 	 = $lret_ValArray['ADMIN_FLAG'];
				$_SESSION["admin_flag"]	     	 = $lret_ValArray['ADMIN_FLAG']; //$admin_flag;
				$_SESSION["date_from"]	     	 = date('Y-m-d', strtotime(date('Y/m/d', time()). '-1 month'));
				$_SESSION["date_to"]	     	 = date('Y-m-d', time());
				/*
				$SQL = "select admin_flag from user_master where username = :username";
				$statement = oci_parse($con, $SQL);
				oci_bind_by_name($statement, ':username', $ladmin_login_name);
				oci_execute($statement);
				while ($row = oci_fetch_array ($statement)) {
					 $_SESSION["admin"] = $row["ADMIN_FLAG"];
				}
				oci_free_statement($statement);
				*/
				/*
				$SQL = "select to_char(t.last_update,'dd-Mon-yyyy') last_update from SYSTEM_SOFTWARE_UPDATE t";
				$statement = oci_parse($con, $SQL);
				oci_execute($statement);
				while ($row = oci_fetch_array ($statement)) {
					 $_SESSION["last_update"] = $row["LAST_UPDATE"];
				}*/

				echo "1";
		}else if ($checkLoginStatus == 4) {		// invalid login
				echo "4";
		} else if ($checkLoginStatus == 2) {		// inactive admin
				echo "2";
		} else if ($checkLoginStatus == 3) {		// suspended admin
				echo "3";
		} else {					// invalid login
				echo "X";
		}
		sqlsrv_close($con);
		//oci_close($con);
	
	//}
	//else
	//{
	//	echo "4"; //invalid login
	//}
?>	

