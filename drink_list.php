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
                  if(response == 'Drink success deleted') { 
                      alert(response, 'drink_list.php');
                      window.location = "drink_list.php";
                  }
                }
            });
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
                            <a href="drink_list.php">Heineken Drink List</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                        <div class="portlet-body form">
                   <div class="form-body" style="margin-left: -50px;">
                            <h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Heineken Drinking List</span></h3>
                    <div class="row" style="margin-left: 50px; margin-top: 10px;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="hide"> No. </th>
                                                <th> Category </th>
                                                <th> Drink Name </th>
												<th> Seq. </th>
                                                <th> Pint </th>
                                                <th> Availability </th>
												<th> Active </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php if( !$con ) {
											 echo "Connection could not be established.<br />";
											 die( print_r( sqlsrv_errors(), true));
											}
											$sql = "
											select t.code, t.drink_category, c.category_name, t.drink_name, format(t.pint, '#0.0') pint, t.display_seq, t.image_url, t.valid_flag, t.active_flag 
											from drinks t, drink_category c
											where t.drink_category = c.code
											order by t.display_seq
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
												echo "<td>". $row['display_seq'] . "</td>";
												echo "<td>". $row['pint'] . "</td>";
                                                //echo "<td>". $row['valid_flag'] . " </td>";
												if ($row['valid_flag'] == 'Y') {
													echo "<td> Available </td>";
												}
												else {
													echo "<td><span style='color:red;'>Out of Stock</span></td>";
												}
												if ($row['active_flag'] == 'Y') {
													echo "<td> Active </td>";
												}
												else {
													echo "<td><span style='color:red;'>Disabled</span></td>";
												}
												echo "<td><a href='drink_edit.php?code=".$row['code']."'>Edit</a></td>";
												echo "</tr>";
											}
											sqlsrv_free_stmt($result);
											sqlsrv_close($con);
											?>
                                            </tbody>
                                            <script>
                                                function confirmDelete(delete_id){
                                                    if(confirm("Are you sure you want to delete this drink?")){
                                                        window.location.href='includes/class/drink_c_delete.php?delete_id=' +delete_id+'';
                                                        return true;
                                                    }                                                       
                                                }
                                            </script>
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