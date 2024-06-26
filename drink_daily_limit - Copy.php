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

if( !$con ) {
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "
	select l.daily_limit drink_limit, '' drink_date, 'SYS' rec_type from drink_limit l
	union all
	select d.drink_limit, d.drink_date, 'DAY' rec_type from drink_daily_limit d 
	where d.drink_date = ?
	";
	$params = array(date("Y-m-d"));
	$result = sqlsrv_query($con, $sql, $params);
	if( !$result ) {
		 //echo "Connection could not be established.<br />";
		 die( print_r( sqlsrv_errors(), true));
	}
	$daily_limit = 0;
	$today_limit = 0;
	while($row = sqlsrv_fetch_array($result)){
		if ($row['rec_type']=='SYS') {$daily_limit = $row['drink_limit'];}
		else if ($row['rec_type']=='DAY') {$today_limit = $row['drink_limit'];}
	}
	sqlsrv_free_stmt($result);
	sqlsrv_close($con);
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
                  if(response = 'Daily drink limit success updated"') { 
                      alert(response, '#');
                      window.location = "#";
                  }
                }
            });
        }

        function btncancel_onclick() {
            window.location = "drink_list.php";
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
                            <a href="drink_daily_limit.php">Drink Daily Limit</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                            <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="includes/class/drink_daily_limit_c_upd.php" method="post" name="create_user" id="create_user" class="form-horizontal" onSubmit="return sendForm(this);" enctype="multipart/form-data" data-toggle="validator">

                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                                <div class="form-body">
                                <h3 class="form-section" style="margin-top: -10px; color: #006633">Drink Daily Limit (Point)</h3>
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful!
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="col-md-3 control-label">Daily Limit <b class="required">*</b></label>
                                                
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" id="daily_limit" name="daily_limit" required value=<?php echo $daily_limit;?>>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="col-md-3 control-label">Today (<?php echo date('d M Y')?>) Limit <b class="required">*</b></label>
                                                
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" id="today_limit" name="today_limit" required value=<?php echo $today_limit; ?>>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn font-white" style="background-color: #006633" onClick="return btncancel_onclick()">Cancel</button>
                                            <button type="submit" id="submit" name="submit" style="background-color: #006633" class="btn font-white">Update Limit</button>
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