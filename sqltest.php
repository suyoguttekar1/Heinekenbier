<?php
$serverName = "hstsmy119491\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=>"hm_bar", "UID"=>"hm_bar", "PWD"=>"redant123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>