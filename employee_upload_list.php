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
	<script src="assets/js/jquery-1.8.3.min.js"></script>
	<?php include_once 'header.php';?>
	<!--BEGIN OLD SCRIPT-->
	<script src="template/js/modernizr.js"></script>
	<script type="text/javascript" src="includes/third_party/ckeditor/ckeditor.js"></script>

	<script type="text/javascript">
	function sendForm(form){
		return PLX.Submit(form, {
			"preloader":"pr_ci_submit",
			"onFinish": function(response){
			  if(response != '' || response== 'Employee successfully uploaded') {
				  alert(response, 'Employee successfully uploaded');
			  }
			  window.location = "employee_mass_upload.php";
			}
		});
	}

	function btncancel_onclick() {
		window.location = "employee_mass_upload.php";
	}
	</script>
	<!--END OLD SCRIPT-->
	
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
                            <a href="employee_list.php">Heineken Employee</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="employee_upload_list.php">Employee Upload Listing</a>
                            
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
						<div class="portlet box white">
                        <div class="portlet-body form">
						 <!-- BEGIN FORM-->
                            <form action="employee_upload_replace.php" method="post" name="news_form" id="news_form" class="form-horizontal" onSubmit="return sendForm(this);" enctype="multipart/form-data">

                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                                <div class="form-body" style="margin-left: -50px;">
                                <h3 class="font-red form-section" style="margin-top: -10px; margin-left: 50px;">Upload Records</h3>                                    
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" id="submit" name="submit" class="btn btn-circle btn-danger">Upload</button>
                                            <button type="button" class="btn btn-circle btn-danger" onClick="return btncancel_onclick()">Cancel</button>
                                            <span id="pr_ci_submit" style="visibility:hidden;font-size:small;"> Processing. Please wait.</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
						
						
                   <div class="form-body" style="margin-left: -50px;">
                   <h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Employee Upload List</span></h3>
                    <div class="row" style="margin-left: 50px; margin-top: 10px;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                            	<th class="hide"> No. </th>
                                                <th> Employee ID </th>
                                                <th> Employee Name </th>
                                                <th> Position </th>
												<th> Validity </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if( !$con ) {
											 echo "Connection could not be established.<br />";
											 die( print_r( sqlsrv_errors(), true));
											}
											$sql = "
											select valid_flag, employee_id, name, position, department, err_msg from tmp_employee 
											order by valid_flag, name
											";
											$result = sqlsrv_query($con, $sql);
											if( !$result ) {
												 //echo "Connection could not be established.<br />";
												 die( print_r( sqlsrv_errors(), true));
											}
											
											while($row = sqlsrv_fetch_array($result)){
												echo "<tr class='odd gradeX'>";
												echo "<td class='hide'>". $row['employee_id']. "</td>";
												echo "<td>" .$row['employee_id']. "</td>";
												echo "<td>". $row['name'] . "</td>";
												echo "<td>". $row['position'] . "</td>";
												echo "<td>". $row['err_msg'] . "</td>";												
												//echo "<td><a href='employee_edit.php?employee_id=".$row['employee_id']. "'>Edit</a> | <a href='employee_delete.php?employee_id=".$row['employee_id']. "'>Delete</a></td>";
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
        </div>
        <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        
        <?php include_once 'footer.php';?>