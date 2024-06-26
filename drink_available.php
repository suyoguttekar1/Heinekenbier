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
include "./includes/third_party/PHPLiveX.php";
$ajax = new PHPLiveX();
$ajax->Run();
?>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
	

        <!--BEGIN OLD SCRIPT-->
        <script src="template/js/modernizr.js"></script>
        <!--<script type="text/javascript" src="includes/third_party/ckeditor/ckeditor.js"></script> -->
        <script type="text/javascript">
        function sendForm(form){
            return PLX.Submit(form, {
                "preloader":"pr_ci_submit",
                "onFinish": function(response){
                  if(response != '') { 
                      alert(response, '#.php');
                      window.location = "#.php";
                  }
                }
            });
        }

        function btncancel_onclick() {
            window.location = "drink_list.php";
        }
        </script>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script>
		 function save_checkbox() {
			 echo 'Clicked';
			//$.post( 'includes\class\drink_c_upd_valid.php' , { checked : valid, code : code }, 
			   //function( response ) {
				 //alert(response);
				 //$( "#result" ).html( response );
			   //}
			//);
		 }
		</script>
		
        <!--END OLD SCRIPT-->

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
                            <a href="drink.php">Add Drink</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                        	<div class="portlet-body form">
                        		<div class="form-body" style="margin-left: -50px;">
                            		<h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Available Drink</span></h3>
                    				<div class="row" style="margin-left: 50px;">
									<!--<div class="row" style="margin-left: 50px; margin-top: 10px;"> -->

                    					<div class="col-md-12" style="margin-top: -20px;">
				                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
				                            <div class="portlet light bordered">
	                                			<div class="portlet-body">
				                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
			                                        <thead>
			                                            <tr>
			                                                <th class="hide" style="width: 300px;"> No. </th>
			                                                <th style="width: 100px;"> Category </th>
			                                                <th style="width: 100px;"> Drink </th>
			                                                <th style="width: 100px;"> Available / Unavailable </th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
													<?php if( !$con ) {
														 echo "Connection could not be established.<br />";
														 die( print_r( sqlsrv_errors(), true));
														}
														$sql = "
														select t.code, t.drink_category, t.drink_name, c.category_name, t.display_seq, t.valid_flag 
														from drinks t, drink_category c
														where t.drink_category = c.code
														";
														$result = sqlsrv_query($con, $sql);
														if( !$result ) {
															 //echo "Connection could not be established.<br />";
															 die( print_r( sqlsrv_errors(), true));
														}
														
														while($row = sqlsrv_fetch_array($result)){
															echo "<tr class='odd gradeX'>";
															echo "<td class='hide'>". $row['code']. "</td>";
															echo "<td>" .$row['category_name']. "</td>";
															echo "<td>". $row['drink_name'] . "</td>";
															if ($row['valid_flag']=='Y') {
																echo "<td><center><input type=checkbox name=available  checked onclick=\"save_checkbox()\" ></center></td>"; }
															else {echo "<td><center><input type=checkbox name=available onclick=\"save_checkbox()\" ></center></td>"; }
															//echo "<td><a href='drink_edit.php?code=".$row['code']. "'>Edit</a> | <a href='#'>Delete</a></td>";
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
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php include_once 'footer.php';?>