<?php 
if(!isset($_SESSION)){
    session_start();
}
if ($_SESSION["valid_login"] != 'YES' ) {
        header("Location: default.php");
        exit();
}
include_once 'header.php';
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
                            <a href="main.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="main.php">Dashboard</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                    		<div class="portlet-body form">
                   				<div class="form-body">
                     				<h3 class="form-section" style="margin-top: -10px; color: #006633">Dashboard</h3>
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

