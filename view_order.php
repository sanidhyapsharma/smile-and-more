<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) 
{
	header('Location:index.php');
}
	// code to cancel the order
	if (isset($_GET['cancel_pid'])) 
	{
		$pid=$_GET['cancel_pid'];
		$qry_update_status=mysql_query("UPDATE `prod_ordered_list` SET `prod_status`='Cancelled' WHERE `prod_ord_id`='$pid'");
		if ($qry_update_status) 
		{
			echo "<script>
							alert('Product Order Canceled.!!');
							window.location='view_order.php';
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
		  <!-- breadcrumbs -->
		  	<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
					    <a class="navbar-brand" href="#">Girishree Digital Studio</a>
					</div>
						<ul class="nav navbar-nav">
						    <li ><a href="admin.php">Home</a></li>
						    <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Service Details <span class="caret"></span></a>
							    <ul class="dropdown-menu">
							        <li><a href="view_event.php">View Registered Event List</a></li>
							    </ul>
							</li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->
<!--  code for display the product ordered details -->
	<div class="inner_content_w3_agile_info two_in">
	    <div class="forms-main_agileits">
			<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(12).jpg');background-size:cover; width:100%; text-align:center;">
             	<h3 class="w3_inner_tittle two">Product Ordered List</h3>
					<table class="table table-hover">
                        <thead style="color:red; ">
                            <tr>											
								<th>User Name</th>
								<th>Category Name</th>
								<th>Design Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Size</th>
								<th>Total Amount</th>
								<th>Action</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									$qry_select=mysql_query("SELECT * FROM `prod_ordered_list` Order by 'prod_ord_date' desc");
										while ($row=mysql_fetch_array($qry_select)) 
										{
								?>
								<form method="post" action="view_order.php">
									<td style="display: none;"><input readonly=""  type="text" class="form-control" name="pid" value="<?php echo $row['prod_ord_id'] ?>"></td>

									<td><input readonly=""  type="text" class="form-control" name="uname" value="<?php echo $row['usr_name'] ?>"></td>

									<td><input readonly=""  type="text" class="form-control" name="cname" value="<?php echo $row['cat_name'] ?>"></td>
                                    
                                    <td><input readonly=""  type="text" class="form-control" name="dname" value="<?php echo $row['design_name'] ?>"></td>
                                       
                                    <td style="display: none;"><input readonly=""  type="text" class="form-control" name="ord_date" value="<?php echo $row['prod_ord_date'] ?>"></td>
                                                                                      
                                    <td><input readonly=""  type="text" class="form-control" name="pqty" value="<?php echo $row['prod_ord_quantity'] ?>"></td>
                                    
                                    <td><input readonly=""  type="text" class="form-control" name="pprice" value="<?php echo $row['prod_ord_price'] ?>"></td>
                                    
                                    <td><input readonly=""  type="text" class="form-control" name="psize" value="<?php echo $row['prod_ord_size'] ?>"></td>
                                                                             
                                    <td><input readonly=""  type="text" class="form-control" name="ptot" value="<?php echo $row['prod_ord_tot_amt'] ?>"></td>                                                                               
									<td>
										<?php	
											$pid=$row['prod_ord_id'];
											$qry_select_status=mysql_query("SELECT `prod_status` FROM `prod_ordered_list` WHERE `prod_ord_id`='$pid'");
												$row_status=mysql_fetch_array($qry_select_status);
												$status=$row_status['prod_status'];
												if ($status=="Pending") 
												{
										?>
												<a class="btn btn-success" href="assign_studio.php?pid=<?php echo $row['prod_ord_id'] ?>" >Assign Studio Manager</a>
												<br><br><a class="btn btn-warning" href="view_order.php?cancel_pid=<?php echo $row['prod_ord_id'] ?>">Cancel</a>
										<?php
												}
												else if ($status=="Assigned") 
												{
										?>
												<p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 37%;">Assigned</p>
												<br><a class="btn btn-warning" href="view_order.php?cancel_pid=<?php echo $row['prod_ord_id'] ?>">Cancel</a>
										<?php 
												} 
												else if ($status=="Cancelled") 
												{
										?>
												<br><p style="color: red; background-color: white;font-weight: 700;font-size:14px;height: 37%;">Cancelled</p>
											<?php
												}
												else if($status=="Done")
												{
											?>
												<p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 47%;">Done</p>
											    <?php
											    }
											    ?> 
                                        </td>
											<td><?php
													$pid=$row['prod_ord_id'];
													$qry_select_status=mysql_query("SELECT `status` FROM `prod_ordered_list` WHERE `prod_ord_id`='$pid'");
													$row_status=mysql_fetch_array($qry_select_status);
												    $status1=$row_status['status'];
												    if($status1=="Amount Paid")
												    {
												?>
												    <p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 47%;">Amount Paid</p>
												<?php
													 }
												?>
											</td>
									</td>
								</form>
							</tr>
								<?php
											}
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>												
	<!-- end of code for display the product ordered details -->
				
							
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