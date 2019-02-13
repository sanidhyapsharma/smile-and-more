<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) 
{
	header('Location:index.php');
}
// code to assign the studio manager
	if (isset($_POST['btn_assign_p'])) 
	{
		$evid=$_POST['evid'];
		$emid=$_POST['emid'];
		$qry_assignment=mysql_query("INSERT INTO `event_assignment`(`event_assign_id`, `event_id`, `emp_id`) VALUES ('','$evid','$emid')");

		if ($qry_assignment) 
		{
			$qry_update_status=mysql_query("UPDATE `event_book_list` SET `status`='assigned' WHERE `event_id`='$evid'");
			if ($qry_update_status) 
			{
				echo "<script>
								alert('Photographer Assigned Successfully!..');
								window.location='view_event.php';
					</script>";
			}
			
		}
		else
		{
			echo "<script>
						alert('Access Denied!!');
						window.location='view_event.php';
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
<body style="background:url('images/images(12).jpg');background-size:;">
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
								<li><a href="admin.php"> <i class="fa fa-home"></i> Home</a></li>
								<li><a href="add_branch.php"> <i class="fa fa-share-alt"></i> Branch Details</a></li>
								<li><a href="add_emp.php"> <i class="fa fa-black-tie"></i> Employee Details</a></li>
								<li><a href="add_category.php"><i class="fa fa-empire"></i>Product Details</a></li>
								<li><a href="view_event.php"> <i class="fa fa-server"></i> Service Details</a></li>
								<li><a href="product_report.php"> <i class="fa fa-list-alt"></i> Reports</a></li>
								<li><a href="feedback.php"> <i class="fa fa-comments"></i> Feedback</a></li>
								<li><a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>ADMIN PAGE </a></h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><img src="images/admin.jpg" alt=""> </span> 
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a> </li>
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
<!-- code for assign photogrpher -->
<div class="inner_content_w3_agile_info two_in">
		<div class="forms-main_agileits" >
				<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(13).jpg');background-size:cover; width:70%; text-align:center;">
					<h3 class="w3_inner_tittle two">Assign Photographer</h3>
						<div class="grid-1 ">
							<div class="form-body">
								<form class="form-horizontal" method="post" action="assign_photographer.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label"></label>
                            				<input type="hidden" name="evid" value="<?php echo $_GET['evid'] ?>">
											<div class="col-sm-6">
												<select id="category" class="form-control" name="emid" required="">
											<option value="">Select Photographer</option>
												<?php
													$qry_category=mysql_query("SELECT * FROM `emp_details` where `emp_type`='photographer'");
													while ($row=mysql_fetch_array($qry_category)) 
													{
												?>
											<option value="<?php echo $row['emp_id']; ?>">
												<?php echo $row['emp_name']; ?>
											</option>
												<?php
													}
												?>
										</select>

											</div>
									</div>

			                        <div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label"></label>
										<div class="col-md-6">
											<button type="submit" class="btn btn-default" name="btn_assign_p">Assign Photographer</button>
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
<!-- banner -->
<!--copy rights start here-->
<!--copy rights end here-->
<!-- js -->

          <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		  <script src="js/modernizr.custom.js"></script>
		
		   <script src="js/classie.js"></script>
		  <script src="js/gnmenu.js"></script>
		  <script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		 </script>

<!-- //js -->
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>