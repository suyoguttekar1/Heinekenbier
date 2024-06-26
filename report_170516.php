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
//include "./includes/third_party/PHPLiveX.php";
//$ajax = new PHPLiveX();
//$ajax->Run();
extract($_GET);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Admin Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

        <style type="text/css">
    			#chart-container {
    				width: 1100px;
    				height: auto;
    			}
          #chart-container3 {
    				width: 550px;
    				height: auto;
    			}
          #chart-container2 {
    				width: 550px;
    				height: auto;
    			}
    		</style>
    </head>
    <!-- END HEAD -->

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
                            <a href="report.php">Heineken Report</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                        	<div class="portlet-body form">
                        		<div class="form-body" style="margin-left: -50px;">
                            		<h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Heineken Drink Report</span></h3>
                    				<div class="row" style="margin-left: 50px; margin-top: 10px;">

                                    <!-- BEGIN FORM-->
                                    <form action="" method="GET" class="form-horizontal">
                                        <div class="form-body">

                                        	<div class="form-group">
                                                <label class="control-label col-md-3">Date Range</label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-large date-picker input-daterange" data-date="2012/10/11" data-date-format="yyyy-mm-dd">
                                                        <input type="text" class="form-control" name="date_from" id="date_from">
                                                        <span class="input-group-addon"> to </span>
                                                        <input type="text" class="form-control" name="date_to" id="date_to"> </div>
                                                    <!-- /input-group -->
                                                    <span class="help-block"> Select date range </span>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn" name="submit" id="submit" style="margin-left: 235px; background-color: #006633; color: white;">
                                        </div>
                                    </form>
                                    <!-- END FORM-->

                                    <div style="display: none;">
                                        <?php

                                        $date_from = $_GET['date_from'];
                                        $date_to = $_GET['date_to'];?>

                                        <input type="hidden" id="start_date" value="<?php echo htmlspecialchars($date_from); ?>" >
                                        <input type="hidden" id="end_date" value="<?php echo htmlspecialchars($date_to); ?>" >
                                            <!-- $output = "42"; //Again, do some operation, get the output.
                                            echo htmlspecialchars($output); /* You have to escape because the result
                                                                               will not be valid HTML otherwise. */
                                        ?> -->
                                    </div>

                                    <div class="row">
        					                        <div class="col-md-6">
        					                        	<label style="margin-left: 20px;"><h3><b>Category Total Consumption Report</b></h3></label><br><br>
        					                        	<div class="portlet light portlet-fit bordered">

                                                  <!-- category total graph -->
                                                  <canvas id="categoryTotalGraph"></canvas>

        					                            </div>
        					                        </div>

        					                        <div class="col-md-6">
        					                        	<label style="margin-left: 20px;"><h3><b>Category Total Percentage Report</b></h3></label><br><br>
  			                                    <div class="portlet light bordered">

                                              <!-- category percentage graph -->
                                              <canvas id="categoryPercentageGraph"></canvas>

			                                        </div>
			                                    </div>
			                                </div>
                                      <br><br>

          	                        		<!-- BEGIN ROW -->
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <!-- BEGIN CHART PORTLET-->
                                                      <label><h3><b>Drink Consumption Report</b></h3></label><br><br>
                                                          <div class="portlet-body">

                                                                <!-- drink consumption graph -->
                                                                <canvas id="drinkGraph"></canvas>

                                                          </div>
                                                      <!-- END CHART PORTLET-->
                                                  </div>
                                              </div>
                                              <!-- END ROW -->
                                              <br><br>
                                          <div class="row">
                                            <div class="col-md-12" style="margin-top: -20px;">
                                              <label style="margin-left: 20px;"><h3><b>Detail Consumption Report</b></h3></label>
                                          <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light bordered">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="hide"> No. </th>
                                                                    <th> Category </th>
                                                                    <th> Drink </th>
                                                                    <th> Order </th>
                                                                    <th> Individual Report </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															<?php if( !$con ) {
																 echo "Connection could not be established.<br />";
																 die( print_r( sqlsrv_errors(), true));
																}
																$sql = "
																select t.drink_code, c.category_name, d.drink_name, count(t.order_id) total_order, 'http://oc.redant.my/report_drink_download.php?drink_code='+ltrim(str(t.drink_code)) as down_link 
																from order_drink_detail t, drink_category c, drinks d
																where t.drink_code = d.code
																and d.drink_category = c.code
																and t.tran_date between ? and ?
																group by t.drink_code,c.category_name, d.drink_name
																order by d.drink_name
																";
																$params = array($date_from, $date_to);
																$result = sqlsrv_query($con, $sql, $params);
																//$result = sqlsrv_query($con, $sql);
																if( !$result ) {
																	 //echo "Connection could not be established.<br />";
																	 die( print_r( sqlsrv_errors(), true));
																}
																
																while($row = sqlsrv_fetch_array($result)){
																	echo "<tr class='odd gradeX'>";
																	echo "<td class='hide'>". $row['drink_code']. "</td>";
																	echo "<td>" .$row['category_name']. "</td>";
																	echo "<td>". $row['drink_name'] . "</td>";
																	echo "<td>". $row['total_order'] . "</td>";
																	echo "<td><a href='report_consumption_download.php?drink_code=".$row['drink_code']."&date_from=".$_GET['date_from']."&date_to=".$_GET['date_to'] . "'>Download</a></td>";
																	echo "</tr>";
																}
																sqlsrv_free_stmt($result);
																sqlsrv_close($con);
																?>
                                                                </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                    </div>




			                        </div>
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
                <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
                <script type="text/javascript" src="js/Chart.min.js"></script>
                <!-- <script type="text/javascript" src="js/category_total_consumption.js"></script> -->
                <!-- <script type="text/javascript" src="js/category_total_percentage.js"></script> -->
                <!-- <script type="text/javascript" src="js/drink_consumption.js"></script> -->


                <!-- BEGIN CATEGORY TOTAL BAR CHART -->
                <script>

                $(document).ready(function(){
                  var date1 = document.getElementById("start_date").value;
                  // console.log(date1);
                  var date2 = document.getElementById("end_date").value;
                  // console.log(date2);


                  $.ajax({
                    url: 'http://mobileapps.heinekenmalaysia.com/chart_drink_category.php?date_from='+date1+'&date_to='+date2,
                    method: "GET",
                    success: function(data) {
                      console.log(data);
                      var categoryName = [];
                      var drinkCount = [];

                      for (var i in data) {
                        categoryName.push(data[i].Category);
                        drinkCount.push(data[i].Value);
                      }

                      var chartdata = {
                        labels: categoryName,
                        datasets: [
                          {
                            label: 'Category Name',
                            backgroundColor: [
                              'rgba(200, 200, 200, 0.75)',
                              'rgba(59, 89, 152, 0.75)',
                              'rgba(29, 202, 255, 0.75)'
                            ],
                            borderColor: [
                                'rgba(200, 200, 200, 1.0)',
                                'rgba(59, 89, 152, 1)',
                                'rgba(29, 202, 255, 1)'
                            ],
                            // hoverBackgroundColor: 'rgba(200, 200, 200,1)',
                            // hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: drinkCount
                          }
                        ]
                      };

                      var ctx = $("#categoryTotalGraph");

                      var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero: true
                              }
                            }]
                          }
                        }
                      });
                    },
                    error: function(data) {
                      console.log(data);
                    }
                  });
                });
                </script>
                <!-- END CATEGORY TOTAL BAR CHART -->


                <!-- START CATEGORY PERCENTAGE PIE CHART -->
                <script>

                $(document).ready(function(){

                  var date1 = document.getElementById("start_date").value;
                  // console.log(date1);
                  var date2 = document.getElementById("end_date").value;
                  // console.log(date2);


                  $.ajax({
                    url: 'http://mobileapps.heinekenmalaysia.com/chart_drink_category_percentage.php?date_from='+date1+'&date_to='+date2,
                    method: "GET",
                    success: function(data) {
                      console.log(data);
                      var categoryName = [];
                      var drinkCount = [];

                      for (var i in data) {
                        categoryName.push(data[i].Category);
                        drinkCount.push(data[i].Value);
                      }

                      var chartdata = {

                        labels: categoryName,
                        datasets: [
                            {
                                data: drinkCount,
                                backgroundColor: [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ],
                                hoverBackgroundColor: [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ]
                            }
                        ]
                      };

                      var ctx = $("#categoryPercentageGraph");

                      var barGraph = new Chart(ctx, {
                        type: 'pie',
                        data: chartdata
                      });
                    },
                    error: function(data) {
                      console.log(data);
                    }
                  });
                });
                </script>
                <!-- START CATEGORY PERCENTAGE PIE CHART -->

                <script>

                $(document).ready(function(){

                  var date1 = document.getElementById("start_date").value;
                  // console.log(date1);
                  var date2 = document.getElementById("end_date").value;
                  // console.log(date2);


                  $.ajax({
                    url: 'http://mobileapps.heinekenmalaysia.com/chart_drink_consumption.php?date_from='+date1+'&date_to='+date2,
                    method: "GET",
                    success: function(data) {
                      console.log(data);
                      var drinkName = [];
                      var drinkCount = [];

                      for (var i in data) {
                        drinkName.push(data[i].Drink);
                        drinkCount.push(data[i].Quantity);
                      }

                      var chartdata = {
                        labels: drinkName,
                        datasets: [
                          {
                            label: 'Drink Name',
                            backgroundColor: [
                              'rgba(200, 200, 200, 0.75)',
                              'rgba(59, 89, 152, 0.75)',
                              'rgba(29, 202, 255, 0.75)',
                              'rgba(200, 200, 200, 0.75)',
                              'rgba(59, 89, 152, 0.75)',
                              'rgba(29, 202, 255, 0.75)',
                              'rgba(200, 200, 200, 0.75)',
                              'rgba(59, 89, 152, 0.75)',
                              'rgba(29, 202, 255, 0.75)',
                              'rgba(200, 200, 200, 0.75)',
                              'rgba(59, 89, 152, 0.75)',
                              'rgba(29, 202, 255, 0.75)'
                            ],
                            borderColor: [
                                'rgba(200, 200, 200, 1.0)',
                                'rgba(59, 89, 152, 1)',
                                'rgba(29, 202, 255, 1)',
                                'rgba(200, 200, 200, 1.0)',
                                'rgba(59, 89, 152, 1)',
                                'rgba(29, 202, 255, 1)',
                                'rgba(200, 200, 200, 1.0)',
                                'rgba(59, 89, 152, 1)',
                                'rgba(29, 202, 255, 1)',
                                'rgba(200, 200, 200, 1.0)',
                                'rgba(59, 89, 152, 1)',
                                'rgba(29, 202, 255, 1)'
                            ],
                            // hoverBackgroundColor: 'rgba(200, 200, 200,1)',
                            // hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: drinkCount

                          }
                        ]
                      };

                      var ctx = $("#drinkGraph");

                      var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero: true
                              }
                            }]
                          }
                        }
                      });
                    },
                    error: function(data) {
                      console.log(data);
                    }
                  });
                });



                </script>


                <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

                <!-- END CORE PLUGINS -->

                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
                <!-- <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
                <script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script> -->
                <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
                <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
                <!-- <script src="assets/global/plugins/echarts/echarts.js" type="text/javascript"></script> -->
                <!-- END PAGE LEVEL PLUGINS -->

                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
                <!-- END THEME GLOBAL SCRIPTS -->

                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <!-- <script src="assets/pages/scripts/charts-echarts.js" type="text/javascript"></script> -->
                <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
                <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
                <!-- <script src="assets/pages/scripts/charts-amcharts.js" type="text/javascript"></script> -->
                <script src="assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
                <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL SCRIPTS -->

                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
                <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
                <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
                <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
                <!-- END THEME LAYOUT SCRIPTS -->

                <!-- <script>
                  function initMap() {
                    var uluru = {lat: 3.112921, lng: 101.576678};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 16,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                  }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0oza8YJ8SkOeSk8ouuSJf932cMrUj-LE&callback=initMap">
                </script> -->
            </body>

        </html>
