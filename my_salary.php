<?php 
include 'connection.php';

 if (!isset($_SESSION['employee'])) 
{
		header('Location:index.php');
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
<style type="text/css">
	p{
		font-size: 18px;
		color:#E2E2DF;
		text-align:left;
		background-color: #8E8784;
		width:40%;
	}
</style>

</head>
<body style="background:url('images/photography.jpg');background-size: cover;">
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
								<li><a href="view_p_task.php"><i class="fa fa-server"></i>View Tasks</a></li>
								<li><a href="my_salary.php"> <i class="fa fa-envira"></i> Salary Details</a></li>
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
	<!-- code for display the branch details -->
	<div class="inner_content_w3_agile_info two_in">
	    <div class="forms-main_agileits">
			<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/photography.jpg');background-size:cover; width:100%; text-align:center;">
             	<h3 class="w3_inner_tittle two">Salary Details</h3>
             		<div class="panel panel-success">
             			<div class="panel-body">
             				<form action="my_salary.php" method="post">
	             				<div class="col-md-5">
	             					<div class="form-group">
		             					<input type="date" name="fdate" class="form-control" required="">
		             				</div>
	             				</div>
	             				<div class="col-md-5">
	             					<div class="form-group">
		             					<input type="date" name="tdate" class="form-control" required="">
		             				</div>
	             				</div>
	             				<div class="col-md-2">
	             					<div class="form-group">
		             					<input type="submit" value="GO" name="go" class="btn btn-success">
		             				</div>
	             				</div>
             			</div>
             		</div>
		
					<div class="form-group" style="align-self: center;">
						<?php
							if(isset($_POST['go']))
							{
								$e_id=$_SESSION['employee'];
								$go=$_POST['go'];
								$fdate=$_POST['fdate'];
								$tdate=$_POST['tdate'];

							$qry_select=mysql_query("SELECT * FROM `emp_details` where `emp_id`='$e_id'");
								while ($row=mysql_fetch_array($qry_select)) 
									{
										$ename=$row['emp_name'];
										$ephno=$row['emp_phno'];
										$eadd=$row['emp_address'];
										$esal=$row['emp_salary'];

											$qry_present=mysql_query("SELECT * FROM `emp_attendance` where (`att_date` BETWEEN  '$fdate' AND '$tdate') AND `emp_id`='$e_id'  AND `attendance`='Present'");
										$Present=mysql_num_rows($qry_present);
											$qry_absent=mysql_query("SELECT * FROM `emp_attendance` where (`att_date` BETWEEN  '$fdate' AND '$tdate') AND `emp_id`='$e_id' AND `attendance`='Absent'");
										$Absent=mysql_num_rows($qry_absent);

										$total_salary=$Present*$esal;
						
						?>
	                    <p> Name             : <?php echo $ename ?></p> 
	                    <p> Phone            : <?php echo $ephno ?></p>
	                    <p> Address          : <?php echo $eadd ?></p> 
	                    <p> Worked Days      : <?php echo $Present ?></p> 
	                    <p> Absent           : <?php echo $Absent ?></p>
	                    <p>	His Salary       : <?php echo $esal ?></p>					
	                    <p> Total Amount     : <?php echo $total_salary ?></p> 
	                </div>
	                	<?php
	                			}
	                		}

	                	?>
				</div>
		</div>
										
						            </div>
		</div>
	</div>
<!-- end of code for display the branch details -->
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