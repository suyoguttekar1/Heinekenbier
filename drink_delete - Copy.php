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
extract($_GET);
if( !$con ) {
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "
	select t.code, t.drink_category, t.drink_name, t.pint, t.display_seq, t.image_url, t.valid_flag 
	from drinks t where t.code = ?
	";
	$params = array($code);
	$result = sqlsrv_query($con, $sql, $params);
	if( !$result ) {
		 //echo "Connection could not be established.<br />";
		 die( print_r( sqlsrv_errors(), true));
	}
	while($row = sqlsrv_fetch_array($result)){
		$t_drink_category = $row['drink_category'];
		$t_drink_name = $row['drink_name'];
		$t_drink_pint = $row['pint'];
		$t_display_seq = $row['display_seq'];
		$t_drink_valid_flag = $row['valid_flag'];
		$t_image_url = $row['image_url'];
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
                  if(response == 'Drink success deleted') { 
                      alert(response, 'drink_list.php');
                      window.location = "drink_list.php";
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
                            <a href="drink_delete.php">Delete Drink</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                            <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="includes/class/drink_c_delete.php" method="post" name="create_user" id="create_user" class="form-horizontal" onSubmit="return sendForm(this);" enctype="multipart/form-data" data-toggle="validator">
							<input type="hidden" id="code" name="code" value="<?php echo $code; ?>">
                            <div class="alert alert-error hide">
                              <button class="close" data-dismiss="alert"></button>
                              You have some form errors. Please check below.
                           </div>
                                <div class="form-body">
                                <h3 class="form-section" style="margin-top: -10px; color: #006633">Delete Drink </h3>
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful!
                                    </div>
                                    <div class="form-group">
										<div>
											<label class="col-md-3 control-label">Category </label>
                                        </div>
										<div class="col-md-3">
                                            <input type="text" class="form-control" disabled id="drink_category" name="drink_category" 
											value="<?php if($t_drink_category=="1") echo 'Beer/Stout';
													else if($t_drink_category=="2") echo 'Low Alcohol';
													else if($t_drink_category=="3") echo 'No Alcohol';?>">
                                        </div>
										<!--
										<div class="col-md-3">
                                            <select class="form-control" id="drink_category" name="drink_category" required>
                                                <option value="1" <?php if($t_drink_category=="1") echo 'selected="selected"'; ?>> Beer/Stout </option>
                                                <option value="2" <?php if($t_drink_category=="2") echo 'selected="selected"'; ?>> Low Alcohol </option>
                                                <option value="3" <?php if($t_drink_category=="3") echo 'selected="selected"'; ?>> No Alcohol </option>
                                            </select>
                                        </div> -->
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="col-md-3 control-label">Drink Name </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control"disabled id="drink_name" name="drink_name" value="<?php echo $t_drink_name; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="col-md-3 control-label">Display Seq.</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" disabled id="display_seq" name="display_seq" value="<?php echo $t_display_seq; ?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
										<div>
                                        <label class="col-md-3 control-label">Point </label>
                                        </div>
										<div class="col-md-3">
                                            <input type="text" class="form-control" disabled id="drink_pint" name="drink_pint" 
											value="<?php if($t_drink_pint=="0") echo '0.0 Point';
													else if($t_drink_pint=="0.5") echo '0.5 Point';
													else if($t_drink_pint=="1") echo '1.0 Point';?>">
                                        </div>
										
										<!--<div class="col-md-3">
                                            <select class="form-control" id="drink_pint" name="drink_pint" required>
                                                <option value="0" <?php if($t_drink_pint=="0") echo 'selected="selected"'; ?>> 0.0 Point </option>
                                                <option value="0.5" <?php if($t_drink_pint=="0.5") echo 'selected="selected"'; ?>> 0.5 Point </option>
                                                <option value="1" <?php if($t_drink_pint=="1") echo 'selected="selected"'; ?>> 1.0 Point </option>
                                            </select>
                                        </div>-->
                                    </div>
                                    <div class="form-group">
	                                    <div>
	                                        <label class="col-md-3 control-label">Drink Photo </label>
	                                    </div>
                                        <div class="col-md-8">
                                            <img src="<?php echo $t_image_url; ?>"  height="300" width="300">
                                        </div>
                                    </div>
									
                                    <br>
                                    
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn font-white" style="background-color: #006633" onClick="return btncancel_onclick()">Cancel</button>
                                            <button type="submit" id="submit" name="submit" style="background-color: #006633" class="btn font-white">Delete Drink</button>
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