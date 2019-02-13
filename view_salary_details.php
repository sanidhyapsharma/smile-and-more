<?php 
include 'connection.php';

 if (!isset($_SESSION['admin'])) 
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
</head>
<body style="background:url('images/images(12).jpg');background-size: cover;">
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
			<!-- //nav -->
		</div>
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
						    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tasks Details<span class="caret"></span></a>
							    <ul class="dropdown-menu">
							        <li><a href="product_report.php">Assigned Product Orders</a></li>
							    </ul>
							</li>
						    <li class="active" ><a href="view_salary_details.php">Employee Salary Details</a></li>
						</ul>
				</div>
			</nav>		<!-- /inner_content-->
	  <div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
	<!-- code for display the branch details -->
	<div class="inner_content_w3_agile_info two_in">
	    <div class="forms-main_agileits">
			<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(12).jpg');background-size:cover; width:100%; text-align:center;">
             	<h3 class="w3_inner_tittle two">Salary Details</h3>
             		<div class="panel panel-success">
             			<div class="panel-body">
             				<form action="view_salary_details.php" method="post">
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
					<table class="table table-hover">
                        <thead style="color:red;background-color: #4B4B67; ">
                            <tr>
                            	<th>Employee ID</th>
                            	<th>Branch ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Worked Days</th>
								<th>Absent</th>
								<th>Salary details</th>
							</tr>
                        </thead>
                        <tbody style="color:blue;background-color: #BFBF7A;">
                            <tr>
								<?php
									if(isset($_POST['go']))
									{
										$go=$_POST['go'];
										$fdate=$_POST['fdate'];
										$tdate=$_POST['tdate'];

									$qry_select=mysql_query("SELECT * FROM `emp_details` ");
										while ($row=mysql_fetch_array($qry_select)) 
											{
										$e_id=$row['emp_id'];
												
								?>
									<td><?php echo $row['emp_id'] ?></td>

									<td><?php echo $row['branch_id'] ?></td>

									<td><?php echo $row['emp_name'] ?></td>

									<td><?php echo $row['emp_phno'] ?></td>

									<td><?php echo $row['emp_address'] ?></td>

									<td>
											<?php 
												$qry_present=mysql_query("SELECT * FROM `emp_attendance` where (`att_date` BETWEEN  '$fdate' AND '$tdate') AND `emp_id`='$e_id'  AND `attendance`='Present'");
													echo $Present=mysql_num_rows($qry_present);
											?>

									</td>
									<td>
											<?php
												$qry_absent=mysql_query("SELECT * FROM `emp_attendance` where (`att_date` BETWEEN  '$fdate' AND '$tdate') AND `emp_id`='$e_id' AND `attendance`='Absent'");
														echo $Absent=mysql_num_rows($qry_absent);
											?>			
									</td>
											
									<td>
										<?php 
												$qry_present=mysql_query("SELECT * FROM `emp_attendance` where (`att_date` BETWEEN  '$fdate' AND '$tdate') AND `emp_id`='$e_id'  AND `attendance`='Present'");
													 $Present=mysql_num_rows($qry_present);
													 $spd=500;
													 echo $total=$Present*$spd;
											?>

									</td>
							</tr>
								<?php
											}
									}
								?>
						</tbody>
                        </tbody>
                    </table>
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