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
                            <a href="home.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="home.html">Dashboard</a>
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
                                                <span data-counter="counterup" data-value="<?php echo $employee_count; ?>">0</span>
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
                                                <span data-counter="counterup" data-value="<?php echo $daily_limit; ?>">0</span>
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
                                                <span data-counter="counterup" data-value="<?php echo $drink_available; ?>">0</span>
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
                                                <span data-counter="counterup" data-value="<?php echo $drink_out_of_stock; ?>">0</span>
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

        <!-- BEGIN FOOTER-->
        <div class="copyright"> 2017 © Heineken Malaysia Berhad. </div>
        <!-- END FOOTER -->

        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>

