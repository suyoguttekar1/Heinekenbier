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
extract($_GET);
// output headers so that the file is downloaded rather than displayed
date_default_timezone_set("Asia/Kuala_Lumpur");
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=DrinkReport_". date("Y-m-d_H-i-s").".csv");
if( !$con ) {
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
}
$sql = "
select t.drink_code, c.category_name, d.drink_name, CONVERT(VARCHAR(10), t.tran_date, 121) as tran_date, 
lower(t.tran_id) emp_id, e.name, e.position, e.department
from order_drink_detail t, drink_category c, drinks d, employee e
where t.drink_code = d.code
and d.drink_category = c.code
and t.tran_id = e.employee_id
and t.tran_date between ? and ?
";
$params = array($date_from, $date_to);
$result = sqlsrv_query($con, $sql, $params);
if( !$result ) {
	//echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
}
$output = fopen('php://output', 'w');
fputcsv($output, array("REPORT", "DRINK CONSUMPTION REPORT"));
fputcsv($output, array("PERIOD", $date_from, "TO", $date_to));
fputcsv($output, array(""));

fputcsv($output, array("TRAN_DATE", "CATEGORY", "DRINK", "EMP_ID","NAME","POSITION","DEPARTMENT"));
while($row = sqlsrv_fetch_array($result)){
	fputcsv($output, array($row["tran_date"],$row["category_name"], $row["drink_name"], $row["emp_id"], $row["name"], $row["position"], $row["department"]));
}
sqlsrv_free_stmt($result);
sqlsrv_close($con);
fclose($output);
?>