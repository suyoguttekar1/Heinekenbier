<?php
if(!isset($_SESSION)){
    session_start();
}
if ($_SESSION["valid_login"] != 'YES' ) {
        header("Location: default.php");
        exit();
}
//in params: key, ipad_id
	extract($_GET);
	include_once("includes/config.php");
	
	$arrData = array();
	
  $sql = "
	select d.drink_name, count(t.drink_code) drink_count from order_drink_detail t, drinks d
	where t.drink_code = d.code
	and t.tran_date between ? and ?
	group by d.drink_name
	";
	
	$params = array($date_from,$date_to);
	$result = sqlsrv_query($con, $sql, $params);
	while($row = sqlsrv_fetch_array($result)){
		$row_array = array('Drink' => $row["drink_name"],'Quantity' => $row["drink_count"]);
		array_push($arrData, $row_array);
	}
	sqlsrv_free_stmt($result);
	sqlsrv_close($con);

	header('Content-type: application/json');
	$jsonstring = json_encode($arrData, JSON_PRETTY_PRINT);
	echo $jsonstring;

//header('Content-type: application/json');
//echo json_encode(array($arrData), JSON_PRETTY_PRINT);
//echo json_encode(array('posts'=>$posts), JSON_PRETTY_PRINT);
?>