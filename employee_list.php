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
//include "./includes/third_party/PHPLiveX.php";
//$ajax = new PHPLiveX();
//$ajax->Run();
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
                            <a href="employee_list.php">Heineken Employee</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="employee_list.php">Heineken Employee Listing</a>
                            
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="tab-content">
                        <div class="portlet box white">
                        <div class="portlet-body form">
                   <div class="form-body" style="margin-left: -50px;">
                            <h3 class="form-section" style="margin-top: -10px; margin-left: 50px;"> <span style="color: #006633">Heineken Employee List</span></h3>
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
												<th> Department </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if( !$con ) {
											 echo "Connection could not be established.<br />";
											 die( print_r( sqlsrv_errors(), true));
											}
											$sql = "
											select employee_id, name, position, department  from employee 
											order by name
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
												echo "<td>". $row['department'] . "</td>";
												echo "<td><a href='employee_view.php?employee_id=".$row['employee_id']. "'>View</a> | <a href='employee_edit.php?employee_id=".$row['employee_id']. "'>Edit</a> | <a href='employee_delete.php?employee_id=".$row['employee_id']. "'>Delete</a></td>";
												echo "</tr>";
											}
											sqlsrv_free_stmt($result);
											sqlsrv_close($con);
											?>
											<!--										
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 1 </td>
                                                    <td>12340</td>
                                                    <td>Teng Chou Ming</td>
                                                    <td>111111-11-1111</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 2 </td>
                                                    <td>12341</td>
                                                    <td>Bruce Lee</td>
                                                    <td>222222-22-2222</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 3 </td>
                                                    <td>12342</td>
                                                    <td>Soon Joon Wai</td>
                                                    <td>333333-33-3333</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 4 </td>
                                                    <td>12343</td>
                                                    <td>Aaron Das Raju</td>
                                                    <td>444444-44-4444</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 5 </td>
                                                    <td>12344</td>
                                                    <td>Thivagar Arun Raj</td>
                                                    <td>555555-55-5555</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 6 </td>
                                                    <td>12345</td>
                                                    <td>Chan Kai Fung</td>
                                                    <td>666666-66-6666</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 7 </td>
                                                    <td>12346</td>
                                                    <td>Tan Chin Chye</td>
                                                    <td>777777-77-7777</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 8 </td>
                                                    <td>12347</td>
                                                    <td>Chan Keng Heng</td>
                                                    <td>888888-88-8888</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 9 </td>
                                                    <td>12348</td>
                                                    <td>Vijinidharan</td>
                                                    <td>999999-99-9999</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                	<td class="hide"> 10 </td>
                                                    <td>12349</td>
                                                    <td>Nicholas Anthony Das</td>
                                                    <td>987654-32-1987</td>
                                                    <td><a href="employee_edit.php">Edit</a> | <a href="#">Delete</a></td>
                                                </tr> 
												-->
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