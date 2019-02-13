<?php
include 'connection.php';

if (isset($_POST['btn_add'])) 
{
	
	$ename=$_POST['ename'];
	$pno=$_POST['pno'];
	$address=$_POST['address'];
	$doj=$_POST['doj'];
	$qry_insert=mysql_query("INSERT INTO `emp`(`eno`, `ename`, `pno`, `address`, `doj`) VALUES ('','$ename','$pno','$address','$doj')");
	if ($qry_insert) 
	{
		echo "<script>
				alert('Employee Added.');			
				window.location='details.php';		
			</script>";
	}
	else
	{
		echo "<script>
				alert('Canot add Employee,Try Again.!');			
				window.location='details.php';		
			</script>";
			 
	}

	

}
	
	?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Girishree Digital Studio</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body style="background:url('images/images(12).jpg');">
<!-- banner -->
<div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
		  <div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
			  		 <!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu">
						<i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span>
					</a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li><a href="photographer.php"> <i class="fa fa-home"></i> Home</a></li>
								<li><a href="upload_img.php"> <i class="fa fa-image"></i>Upload Images</a></li>
								<li><a href="upload_vdo.php"> <i class="fa fa-vimeo-square"></i>Upload Videos</a></li>
								<li><a href="view_p_task.php"><i class="fa fa-server"></i>View Tasks</a></li>
								<li><a href="view_salary_details.php"> <i class="fa fa-envira"></i> Salary Details</a></li>
								<li><a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>PHOTOGRAPHER PAGE </a></h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><img src="images/admin_icon.png" alt=""> </span> 
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="logout.php"><i class="fa fa-log-out"></i>Logout</a> </li>
								</ul>
							</li>
						</ul>
					</li>
				
					<li class="second full-screen">
						<section class="full-top">
							<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
						</section>
					</li>
			</ul>
		</div>
		<!-- //nav -->
		<div class="clearfix"></div>
	<!-- //w3_agileits_top_nav-->
		
	<!-- /inner_content-->
	  <div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
		  <!-- breadcrumbs -->
		  	<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
					    <a class="navbar-brand" href="#">Girishree Digital Studio</a>
					</div>
						<ul class="nav navbar-nav">
						    <li ><a href="photographer.php">Home</a></li>
						    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Details<span class="caret"></span></a>
							    <ul class="dropdown-menu">
							        <li><a href="view_branch.php">View Details</a></li>
							    </ul>
							</li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->

	<div class="inner_content_w3_agile_info two_in">
		<div class="forms-main_agileits" >
				<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/drop.jpg');background-size:cover; width:50%; text-align:center;">
					<h3 class="w3_inner_tittle two">CUSTOMER DETAILS</h3>
						<div class="grid-1 ">
							<div class="form-body">
								<form class="form-horizontal" method="post" action="cust_info.php" enctype="multipart/form-data">

									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control lock" name="bname" id="focusedinput" placeholder="Name of the Customer" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only">
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-location-arrow"></i>
													</span>
													<input type="text" class="form-control lock" name="bname" id="focusedinput" placeholder="Address of the Customer" required="">
												</div>
											</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="text" class="form-control lock" name="bphno" id="focusedinput" placeholder="Contact Number of the Customer" required="" pattern="[0-9]{10}" title="Please enter only 10 digits">
												</div>
											</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="Email" class="form-control lock" name="bphno" id="focusedinput" placeholder="Email of the Customer" required="">
												</div>
											</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-empire"></i>
													</span>
						                                <select id="event" class="form-control lock" name="event_name" required="" onchange='showhint(this.value)'>
						                                    <option value="">Select Event</option>
						                                    <option value="birthday">Birthday</option>
						                                    <option value="wedding">Marriage</option>
						                                    <option value="other">Other</option>
						                                </select>
						                        </div>
						                    </div>
						            </div>
						            <div class="form-group">
						            	 <div id="disp" >                              
                                
                                		</div>
						            </div>
                    				 <script type="text/javascript">
				                        function showhint(a) {
				                            
				                            var value=a;
				                            // alert(value);
				                            var divv=document.getElementById('disp');
				                             if (value == 'wedding') 
				                             {
				                                         toAppend = "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-male'></i></span><input type='text' class='form-control lock' name='groom_name' placeholder='Name of the Groom ex:Mr.Rama' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-female'></i></span><input type='text' class='form-control lock' name='bride_name' placeholder='Name of the Bride ex:Ms.Seetha' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='text' class='form-control lock'name='mdate' placeholder='06/07/1997' required=''></div></div></div>"; 
				                                         divv.innerHTML=toAppend;
				                             }
				                             else if (value == 'birthday') 
				                             {
				                                toAppend = "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-gift'></i></span><input type='text' class='form-control lock' name='bname' placeholder='ex:rahul/priya' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='text' class='form-control lock' name='bdate' placeholder='06/07/1997' required=''></div></div></div>"; 

				                                         divv.innerHTML=toAppend;
				                             }
				                             else if (value=='other') 
				                             {
				                                    toAppend =  "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'></span><input type='text' class='form-control lock' name='e_name' placeholder='Name Of the Event' required=''></div></div></div>";
				                                     divv.innerHTML=toAppend;
				                             }
				                        }
				                    </script>
				                <div class="form-group">
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="" style="text-align: center;">Event Starting Date/Time</i>
													</span>
												</div>
											</div>
									</div>
									

								<div class="form-group">
                               		<label class="col-md-4 control-label">Event Starting Date/Time </label>
                               			<div class="col-md-8">
                               				<div class="agileits_w3layouts_main_gridl">
                                    			<input class="date form-control lock" id="userdate" name="Text" type="date" required="">
                               				</div>
                               				<div class="agileits_w3layouts_main_gridr">
                                    			 <input type="time" name="Time" class="form-control lock" placeholder=" " required="" >
                               				</div>
                               			</div>
                               	</div>
                               	
                               	<div class="form-group">
                               		<label class="col-md-4 control-label">Event Ending Date/Time </label>
                               			<div class="col-md-8">
                               				<div class="agileits_w3layouts_main_gridl">
                                    			<input class="date form-control lock" id="userdate" name="Text" type="date" required="">
                               				</div>
                               				<div class="agileits_w3layouts_main_gridr">
                                    			 <input type="time" name="Time" class="form-control lock" placeholder=" " required="" >
                               				</div>
                               			</div>
                               	</div>
                               	
									<div class="form-group">
										<label for="focusedinput" class="col-sm-4 control-label"></label>
											<div class="col-sm-4">														<button type="submit" class="btn btn-default" name="btn_add">	Add Now</button>
											</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
