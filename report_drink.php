<?php include_once 'header.php';?>

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
                                    <form action="#" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group ">
                                                <label class="col-md-2" style="text-align: right;"><b>Please Select Date Range : </b></label>
                                                <div class="col-md-4">
                                                    <div id="reportrange" class="btn default">
                                                        <i class="fa fa-calendar"></i> &nbsp;
                                                        <span> </span>
                                                        <b class="fa fa-angle-down"></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->

	                        		<!-- BEGIN ROW -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                                <div class="portlet-body">
                                                    <div id="chart_5" class="chart" style="height: 400px;"> </div>
                                                    <div class="well margin-top-20">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label class="text-left">Top Radius:</label>
                                                                <input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                                                            <div class="col-sm-3">
                                                                <label class="text-left">Angle:</label>
                                                                <input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                                                            <div class="col-sm-3">
                                                                <label class="text-left">Depth:</label>
                                                                <input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- END CHART PORTLET-->
                                        </div>
                                    </div>
                                    <!-- END ROW -->
                                    <br><br>

                                    <div class="row">
                                    	<div class="col-md-12">
		                                    <!-- BEGIN CHART PORTLET-->
		                                    <div class="portlet light bordered">
		                                        <div class="portlet-body">
		                                            <div id="chart_7" class="chart" style="height: 400px;"> </div>
		                                            <div class="well margin-top-20">
		                                                <div class="row">
		                                                    <div class="col-sm-3">
		                                                        <label class="text-left">Top Radius:</label>
		                                                        <input class="chart_7_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
		                                                    <div class="col-sm-3">
		                                                        <label class="text-left">Angle:</label>
		                                                        <input class="chart_7_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
		                                                    <div class="col-sm-3">
		                                                        <label class="text-left">Depth:</label>
		                                                        <input class="chart_7_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <!-- END CHART PORTLET-->
		                                </div>
                                    </div>

                                    <div class="col-md-12" style="margin-top: -20px;">
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
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 1 </td>
			                                                    <td>Category A</td>
			                                                    <td>Drink 1</td>
			                                                    <td>5</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 2 </td>
			                                                    <td>Category B</td>
			                                                    <td>Drink 2</td>
			                                                    <td>10</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 3 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Drink 3</td>
			                                                    <td>25</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 4 </td>
			                                                    <td>Category A</td>
			                                                    <td>Drink 4</td>
			                                                    <td>15</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 5 </td>
			                                                    <td>Category B</td>
			                                                    <td>Drink 5</td>
			                                                    <td>30</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 6 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Drink 6</td>
			                                                    <td>5</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 7 </td>
			                                                    <td>Category A</td>
			                                                    <td>Drink 7</td>
			                                                    <td>1</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 8 </td>
			                                                    <td>Category A</td>
			                                                    <td>Drink 8</td>
			                                                    <td>8</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 9 </td>
			                                                    <td>Category B</td>
			                                                    <td>Drink 9</td>
			                                                    <td>3</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 10 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Drink 10</td>
			                                                    <td>10</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
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
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php include_once 'footer.php';?>