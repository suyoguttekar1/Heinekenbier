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

if( !$con ) {
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
	}
	$sql = "
	select 1 row_no, 'drink_available' rec_type, convert(decimal(10,0), count(*)) rec_value from drinks where valid_flag = 'Y'
	union all
	select 2 row_no,'drink_out_of_stock' rec_type, convert(decimal(10,0), count(*)) rec_value from drinks where valid_flag = 'N'
	union all
	select 3 row_no,'employee_count' rec_type, convert(decimal(10,0), count(*)) rec_value from employee
	union all
	select 4 row_no, 'daily_limit' rec_type, convert(decimal(10,0), daily_limit) rec_value from drink_limit
	union all
	select 5 row_no, 'daily_limit' rec_type, convert(decimal(10,0), t.drink_limit) rec_value  from drink_daily_limit t 
	where t.drink_date = convert(char(10), getdate(), 126)
	order by row_no
	";
	//$params = array($date_from, $date_to);
	$result = sqlsrv_query($con, $sql); //, $params);
	//$result = sqlsrv_query($con, $sql);
	if( !$result ) {
	 //echo "Connection could not be established.<br />";
	 die( print_r( sqlsrv_errors(), true));
	}

	while($row = sqlsrv_fetch_array($result)){
		if ($row['rec_type'] == 'drink_available') {
			$drink_available = $row['rec_value'];
		} else if ($row['rec_type'] == 'drink_out_of_stock') {
			$drink_out_of_stock = $row['rec_value'];
		} else if ($row['rec_type'] == 'employee_count') {
			$employee_count = $row['rec_value'];
		}else if ($row['rec_type'] == 'daily_limit') {
			$daily_limit = $row['rec_value'];
		}
	}
	sqlsrv_free_stmt($result);
	sqlsrv_close($con);
																
?>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php include_once 'topNavbar.php';?>
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php include_once 'sidebar.php';?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="main.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="main.php">Dashboard</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                    		<div class="portlet-body form">
                   				<div class="form-body">
                     				<h3 class="form-section" style="margin-top: -10px; color: #006633">Dashboard</h3>

                            <!-- BEGIN DASHBOARD STATS 1-->
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                        <div class="visual">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="1349"><?php echo $employee_count; ?></span>
                                            </div>
                                            <div class="desc"> Total User </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                        <div class="visual">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="12,0"><?php echo $daily_limit; ?></span>
                                            </div>
                                            <div class="desc"> Today's Point </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                        <div class="visual">
                                            <i class="fa fa-beer"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="549"><?php echo $drink_available; ?></span>
                                            </div>
                                            <div class="desc"> Total Drink Available </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                        <div class="visual">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="89"><?php echo $drink_out_of_stock; ?></span>
                                            </div>
                                            <div class="desc"> Out of Stock Drink </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- END DASHBOARD STATS 1-->
                     			</div>
                     		</div>
                     	</div>
                     </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <?php include_once 'footer.php';?>
