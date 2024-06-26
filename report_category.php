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
                            <a href="report.php">Heineken Category Report</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                        	<div class="portlet-body form">
                        		<div class="form-body" style="margin-left: -50px;">
                            		<h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Heineken Category Report</span></h3>
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
                                    <br><br>

                                    <!-- BEGIN ROW -->
		                            <div class="row">
		                                <div class="col-md-12">
		                                    <!-- BEGIN CHART PORTLET-->
		                                    <div class="portlet light bordered">
		                                        <div class="portlet-title">
		                                            <div class="caption">
		                                                <i class="icon-bar-chart font-green-haze"></i>
		                                                <span class="caption-subject bold uppercase font-green-haze"> Bar & Line</span>
		                                                <span class="caption-helper">bar and line chart mix</span>
		                                            </div>
		                                            <div class="tools">
		                                                <a href="javascript:;" class="collapse"> </a>
		                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
		                                                <a href="javascript:;" class="reload"> </a>
		                                                <a href="javascript:;" class="fullscreen"> </a>
		                                                <a href="javascript:;" class="remove"> </a>
		                                            </div>
		                                        </div>
		                                        <div class="portlet-body">
		                                            <div id="chart_4" class="chart" style="height: 400px;"> </div>
		                                        </div>
		                                    </div>
		                                    <!-- END CHART PORTLET-->
		                                </div>
		                            </div>
		                            <!-- END ROW -->
                                    
	                        		<!-- <div class="row">
				                        <div class="col-md-12">
				                                <div class="portlet-body">
				                                    <div id="echarts_bar" style="height:500px;"></div>
				                                </div>
				                        </div>
				                    </div> -->

				                    <br><br>

				                    <div class="row">
				                    	<div class="col-md-12">
		                                    <!-- BEGIN CHART PORTLET-->
		                                    
		                                        <div class="portlet-body">
		                                            <div id="chart_6" class="chart" style="height: 725px;"> </div>
		                                        </div>
		                                    
		                                    <!-- END CHART PORTLET-->
		                                </div>
				                    </div>

                                	<br><br>

                                    <div class="col-md-12" style="margin-top: -20px;">
			                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
			                            <div class="portlet light bordered">
                                			<div class="portlet-body">
			                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
			                                        <thead>
			                                            <tr>
			                                                <th class="hide"> No. </th>
			                                                <th> Category </th>
			                                                <th> Name </th>
			                                                <th> Order </th>
			                                                <th> Individual Report </th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 1 </td>
			                                                    <td>Category A</td>
			                                                    <td>Teng Chou Ming</td>
			                                                    <td>5</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 2 </td>
			                                                    <td>Category B</td>
			                                                    <td>Teng Chou Ming</td>
			                                                    <td>10</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 3 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Teng Chou Ming</td>
			                                                    <td>25</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 4 </td>
			                                                    <td>Category A</td>
			                                                    <td>Aaron Das Raju</td>
			                                                    <td>15</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 5 </td>
			                                                    <td>Category B</td>
			                                                    <td>Thivagar Arun Raj</td>
			                                                    <td>30</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 6 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Chan Kai Fung</td>
			                                                    <td>5</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 7 </td>
			                                                    <td>Category A</td>
			                                                    <td>Tan Chin Chye</td>
			                                                    <td>1</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 8 </td>
			                                                    <td>Category A</td>
			                                                    <td>Chan Keng Heng</td>
			                                                    <td>8</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 9 </td>
			                                                    <td>Category B</td>
			                                                    <td>Vijinidharan</td>
			                                                    <td>3</td>
			                                                    <td>
			                                                        <a href="#">Download</a>
			                                                    </td>
			                                                </tr>
			                                                <tr class="odd gradeX">
			                                                    <td class="hide"> 10 </td>
			                                                    <td>Non-Alcoholic</td>
			                                                    <td>Nicholas Anthony Das</td>
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