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
                  if(response != ''|| response=='Employee successfully uploaded') { 
                      alert(response, 'employee_upload_list.php');
                      window.location = "employee_upload_list.php";
                  }
                }
            });
        }

        function btncancel_onclick() {
            window.location = "employee_list.php";
        }employee_list
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
                            <a href="employee_list.php">Heineken Employee</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="employee_mass_upload.php">Upload Mass Employee</a>
                            
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="tab-content">
                        <div class="portlet box white">
                            <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="employee_upload_check.php" method="post" name="mass_upload" id="mass_upload" class="form-horizontal" onSubmit="return sendForm(this);" enctype="multipart/form-data" data-toggle="validator">

                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                                <div class="form-body">
                                <h3 class="form-section" style="margin-top: -10px; color: #006633">Upload Mass Employee</h3>
                                <p class="font-red"><sup>*</sup>Please upload only .csv file with the following field, title is not required<br>&nbsp Employee Name &nbsp&nbsp&nbsp&nbsp Position &nbsp&nbsp&nbsp&nbsp Department &nbsp&nbsp&nbsp&nbsp Employee ID</p>
                                <br>
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful!
                                    </div>
                                    <div class="form-group">
                                        <label for="user_upload" class="col-md-3 control-label">File</label>
                                        <div class="col-md-9">
                                            <input type="file" id="user_upload" name="user_upload" class="default">
                                            <p>Please upload your file here...</p>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn font-white" style="background-color: #006633" onClick="return btncancel_onclick()">Cancel</button>
                                            <button type="submit" id="submit" name="submit" style="background-color: #006633" class="btn font-white">Upload Mass Employee</button>
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