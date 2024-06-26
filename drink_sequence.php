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

//include_once('connection.php');

if(isset($_POST["submit"])) {
  $id_ary = explode(",",$_POST["row_order"]);

  for($i=0;$i<count($id_ary);$i++) {
    // echo $id_ary[$i];
    $j = $i + 1;
    //$query2 = "UPDATE `php_interview_questions` SET `row_order` = ".$j." WHERE `php_interview_questions`.`id` = ". $id_ary[$i];
	$query2 = "UPDATE drinks SET display_seq = ? WHERE code = ?";
    //print($query2);
    //echo "<br>";
    //$result2 = mysqli_query($dbcon, $query2) or die('Error updating data');
	$params = array($j, $id_ary[$i]);
	$result2 = sqlsrv_query($con, $query2, $params);
  }
  sqlsrv_free_stmt($result2);
  
}    
        //$query = "SELECT * FROM php_interview_questions ORDER BY row_order";
        //$result = mysqli_query($dbcon, $query) or die('Error getting data');
		$query = "select * from drinks where active_flag = 'Y' order by display_seq";
		$result = sqlsrv_query($con, $query);

?>
<html lang="en">
<head>
  <!-- <title>Sorting MySQL Row Order using jQuery</title> -->
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <style>
  /*body{width:610px;}*/
  #sortable-row { list-style: none; }
  #sortable-row li { margin-bottom:4px; padding:10px; background-color:#64D19A;cursor:move;}
  /*.btnSave{padding: 10px 20px;background-color: #09F;border: 0;color: #FFF;cursor: pointer;margin-left:40px;}  */
  #sortable-row li.ui-state-highlight { height: 1.0em; background-color:#F0F0F0;border:#ccc 2px dotted;}
  </style>
  <script>
  $(function() {
    $( "#sortable-row" ).sortable({
	placeholder: "ui-state-highlight"
	});
  });
  
  function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
  }
  </script>
</head>
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
                            <a href="drink_sequence.php">Drink Sequence</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="tab-content">
                        <div class="portlet box white">
                        <div class="portlet-body form">
                          <div class="form-body">
                            <h3 class="form-section" style="margin-top: -10px; color: #006633">Drink Sequence</h3>


                            <form name="frmQA" method="POST" />
                            <input type = "hidden" name="row_order" id="row_order" /> 
                            <ul id="sortable-row">
                            <?php
                            //while($row = mysqli_fetch_ASSOC($result)) {
                            	while($row = sqlsrv_fetch_array($result)){
                            ?>
                            <!--<li id=<?php echo $row['id']; ?>><?php echo $row['question']; ?></li> -->
                            <li id=<?php echo $row['code']; ?> style="width: 350px;"><?php echo $row['drink_name']; ?></li>
                            <?php 
                            }
                            // mysqli_free_result ( $result );
                            // mysqli_close($dbcon);  
                            ?>  
                            </ul>
                            <button type="submit" class="btn font-white" name="submit" style="background-color: #006633; margin-left: 40px;" value="Save Order" onClick="saveOrder();">Save Order</button>
                            <!-- <input type="submit" class="btnSave" name="submit" value="Save Order" onClick="saveOrder();" /> -->
                            </form> 

                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
              </div>
          </div>

        <!-- BEGIN CORE PLUGINS -->
        <!-- <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

</body>
</html>