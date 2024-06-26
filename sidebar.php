				<?php
                $arr_filename = explode("/", $_SERVER['SCRIPT_NAME']);
                for($i=0; $i<count($arr_filename); $i++){
                    $filename = $arr_filename[$i];
                }
                ?>

			<!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar-wrapper">
	                <div class="page-sidebar navbar-collapse collapse">
	                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

	                    	<!--Dashboard-->
	                    	<?php if($filename == "main.php"){ ?>
	                        <li class="nav-item start active open">
	                        <?php }else{ ?>
	                        <li class="nav-item start">
	                        <?php } ?>
	                            <a href="main.php" class="nav-link nav-toggle">
	                                <!--<i class="fa fa-main"></i>-->
									<i class="fa fa-home"></i> 
	                                <span class="title">Dashboard</span>
	                                <?php if($filename == "main.php"){ ?>
	                                <span class="selected"></span>
	                                <?php } ?>
	                            </a>
	                        </li>

	                        <!--Drink Listing-->
	                        <?php 
	                        $drink = false;
	                        if($filename == "drink.php" || $filename == "drink_list.php" || 
							$filename == "drink_edit.php" || $filename == "drink_sequence.php" ||
							//$filename == "drink_available.php" || $filename == "drink_sequence.php" ||
							$filename == "drink_daily_limit.php"){ 
	                             $drink = true;
	                        }
	                        ?>
	                        <?php if($drink){ ?>
	                        <li class="nav-item has-sub active ">
	                        <?php }else{ ?>
	                        <li class="nav-item has-sub ">    
	                        <?php } ?>
		                            <a href="javascript:;" class="nav-link nav-toggle">
		                                <i class="fa fa-beer"></i>
		                                <span class="title">Drink Listing</span>
										<?php if($drink){ ?>
		                                    <span class="selected"></span>
		                                    <span class="arrow open"></span>
		                                <?php }else{ ?>
		                                    <span class="arrow "></span>
		                                <?php } ?>
		                            </a>
		                            <ul class="sub-menu">
		                            	<?php if($filename == "drink.php"){ ?>
			                                <li class="active"><a href="drink.php">Add Drink</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="drink.php">Add Drink</a></li>
			                           	<?php } ?>

			                           	<!--<?php if($filename == "drink_available.php"){ ?>
			                                <li class="active"><a href="drink_available.php">Drink Availability</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="drink_available.php">Drink Availability</a></li>
			                           	<?php } ?>-->

			                           	<?php if($filename == "drink_daily_limit.php"){ ?>
			                                <li class="active"><a href="drink_daily_limit.php">Daily Limit (Point)</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="drink_daily_limit.php">Daily Limit (Point)</a></li>
			                           	<?php } ?>

			                           	<?php if($filename == "drink_sequence.php"){ ?>
			                                <li class="active"><a href="drink_sequence.php">Drink Sequence</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="drink_sequence.php">Drink Sequence</a></li>
			                           	<?php } ?>

			                            <?php if($filename == "drink_list.php" || $filename == "drink_edit.php"){ ?>
                                            <li class="active"><a href="drink_list.php">Drink Listing</a></li>
                                        <?php }else{ ?>
                                            <li ><a href="drink_list.php">Drink Listing</a></li>
                                        <?php } ?>
		                            </ul>
		                    </li>



		                    <!--Heineken Employee-->
		                    <?php 
	                        $employee = false;
	                        if($filename == "employee_list.php" || $filename == "employee_mass_upload.php" || $filename == "employee_edit.php" || $filename == "employee_delete.php" ||  $filename == "employee.php" || $filename == "employee_view.php"){ 
	                             $employee = true;
	                        }
	                        ?>
	                        <?php if($employee){ ?>
	                        <li class="nav-item has-sub active ">
	                        <?php }else{ ?>
	                        <li class="nav-item has-sub ">    
	                        <?php } ?>
		                            <a href="javascript:;" class="nav-link nav-toggle">
		                                <i class="fa fa-user"></i>
		                                <span class="title">Heineken Employee</span>
										<?php if($employee){ ?>
		                                    <span class="selected"></span>
		                                    <span class="arrow open"></span>
		                                <?php }else{ ?>
		                                    <span class="arrow "></span>
		                                <?php } ?>
		                            </a>
		                            <ul class="sub-menu">
		                            	<?php if($filename == "employee.php"){ ?>
			                                <li class="active"><a href="employee.php">Add Employee</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="employee.php">Add Employee</a></li>
			                           	<?php } ?>
										<!--
			                           	<?php if($filename == "employee_mass_upload.php"){ ?>
                                            <li class="active"><a href="employee_mass_upload.php">Upload Mass Employee</a></li>
                                        <?php }else{ ?>
                                            <li ><a href="employee_mass_upload.php">Upload Mass Employee</a></li>
                                        <?php } ?>-->

			                            <?php if($filename == "employee_edit.php" || $filename == "employee_delete.php" ||  $filename == "employee_list.php" || $filename == "employee_view.php"){ ?>
                                            <li class="active"><a href="employee_list.php">Heineken Employee Listing</a></li>
                                        <?php }else{ ?>
                                            <li ><a href="employee_list.php">Heineken Employee Listing</a></li>
                                        <?php } ?>
		                            </ul>
		                    </li>

		                    <!--Support-->
	                        <?php if($filename == "report.php"){ ?>
	                        <li class="has-sub active ">
	                        <?php }else{ ?>
	                        <li class="has-sub ">
	                        <?php } ?>
	                                <a href="report.php">
	                                <i class="fa fa-bar-chart"></i> 
	                                <span class="title">Report</span>
	                                <?php if($filename == "report.php"){ ?>
	                                <span class="selected"></span>
	                                <?php } ?>
	                                </a>
	                        </li>

		                    <!--Report-->
	                        <!-- <?php 
	                        $report = false;
	                        if($filename == "report_drink.php" || $filename == "report_category.php"){ 
	                             $report = true;
	                        }
	                        ?>
	                        <?php if($report){ ?>
	                        <li class="nav-item has-sub active ">
	                        <?php }else{ ?>
	                        <li class="nav-item has-sub ">    
	                        <?php } ?>
		                            <a href="javascript:;" class="nav-link nav-toggle">
		                                <i class="fa fa-bar-chart"></i>
		                                <span class="title">Report</span>
										<?php if($report){ ?>
		                                    <span class="selected"></span>
		                                    <span class="arrow open"></span>
		                                <?php }else{ ?>
		                                    <span class="arrow "></span>
		                                <?php } ?>
		                            </a>
		                            <ul class="sub-menu">
		                            	<?php if($filename == "report_category.php"){ ?>
			                                <li class="active"><a href="report_category.php">Category</a></li>
			                            <?php }else{ ?>
			                            	<li ><a href="report_category.php">Category</a></li>
			                           	<?php } ?>

			                            <?php if($filename == "report_drink.php"){ ?>
                                            <li class="active"><a href="report_drink.php">Drink</a></li>
                                        <?php }else{ ?>
                                            <li ><a href="report_drink.php">Drink</a></li>
                                        <?php } ?>
		                            </ul>
		                    </li> -->


	                        <!--Support-->
	                        <?php if($filename == "support.php"){ ?>
	                        <li class="has-sub active ">
	                        <?php }else{ ?>
	                        <li class="has-sub ">
	                        <?php } ?>
	                                <a href="support.php">
	                                <i class="fa fa-envelope-o"></i> 
	                                <span class="title">Support</span>
	                                <?php if($filename == "support.php"){ ?>
	                                <span class="selected"></span>
	                                <?php } ?>
	                                </a>
	                        </li>
	                        
							<!--Logout-->
	                        <?php if($filename == "logout.php"){ ?>
	                        <li class="has-sub active ">
	                        <?php }else{ ?>
	                        <li class="has-sub ">
	                        <?php } ?>
	                                <a href="logout.php">
	                                <i class="fa fa-home"></i> 
	                                <span class="title">Logout</span>
	                                <?php if($filename == "logout.php"){ ?>
	                                <span class="selected"></span>
	                                <?php } ?>
	                                </a>
	                        </li>
	                    </ul>
	                    <!-- END SIDEBAR MENU -->
	                </div>
	                <!-- END SIDEBAR -->
            	</div>
            </div>
            <!-- END SIDEBAR -->