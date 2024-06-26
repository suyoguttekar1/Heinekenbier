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
        <script type="text/javascript" src="includes/third_party/ckeditor/ckeditor.js"></script>

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
            window.location = "employee_list.php";
        }
        </script>
        <!--END OLD SCRIPT-->

        <?php include_once 'topNavbar.php';?>
        <!-- END HEADER -->
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
                            <a href="employee_list.php">Heineken User</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="employee.php">Create New User</a>
                            
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="tab-content">
                        <div class="portlet box white">
                            <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="includes/class/employee_c_add.php" method="post" name="create_user" id="create_user" class="form-horizontal" onSubmit="return sendForm(this);" enctype="multipart/form-data" data-toggle="validator">

                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                                <div class="form-body">
                                <h3 class="form-section" style="margin-top: -10px; color: #006633">Add New Employee</h3>
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful!
                                    </div>
                                    <div class="form-group">
	                                    <div>
	                                        <label class="col-md-3 control-label">Employee ID <b class="required">*</b></label>
	                                            
	                                    </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                                        </div>
                                    </div>

                                    <div class="form-group">

	                                    <div>
	                                        <label class="col-md-3 control-label">Name <b class="required">*</b></label>
	                                            
	                                    </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
	                                    <div>
	                                        <label class="col-md-3 control-label">Position </label>
	                                    </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="position" name="position">
                                        </div>
                                    </div>
                                    
									<div class="form-group">
	                                    <div>
	                                        <label class="col-md-3 control-label">Department </label>
	                                    </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="department" name="department">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="user_upload" class="col-md-3 control-label">Employee Image<br/>(260x260px, jpg) </label>
                                        <div class="col-md-9">
                                            <input type="file" id="user_upload" name="user_upload" class="default">
                                            <p>Please upload your image here...</p>
                                        </div>
                                    </div>
									
                                    <br>
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn font-white" style="background-color: #006633" onClick="return btncancel_onclick()">Cancel</button>
                                            <button type="submit" id="submit" name="submit" style="background-color: #006633" class="btn font-white">Save</button>
                                            <span id="pr_ci_submit" style="visibility:hidden;font-size:small;"> Processing. Please wait.</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
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