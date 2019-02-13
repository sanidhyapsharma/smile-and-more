<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) 
{
	header('Location:index.php');
}
// code to assign the photographer
	if (isset($_GET['cancel_event_id'])) 
	{
		$event_id=$_GET['cancel_event_id'];


		$qry_update_status=mysql_query("UPDATE `event_book_list` SET `status`='cancelled' WHERE `event_id`='$event_id'");
		if ($qry_update_status) 
		{
			echo "<script>
							alert('Event Cancelled.!!');
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
							        <li><a href="view_order.php">View Product order List</a></li>
							    </ul>
							</li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->
<!--  code for display the product ordered details -->
	<div class="inner_content_w3_agile_info two_in">
	    <div class="forms-main_agileits">
			<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(12).jpg');background-size:cover;width:100%;text-align:center;float: left;">
             	<h3 class="w3_inner_tittle two">Booked Event List</h3>
					<table class="table table-hover " >
                        <thead style="color:red; ">
                            <tr>
								<th>User Name</th>
								<th>Event Type</th>
								<th>Event Starting Date</th>
								<th>Event Starting Time</th>
								<th>Event Ending Date</th>
								<th>Event Ending Time</th>
								<th>Actions</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									$qry_select=mysql_query("SELECT * FROM `event_book_list` Order by 'eve_book_date' desc");
									while ($row=mysql_fetch_array($qry_select)) 
									{
								?>
									<form method="post" action="assign_photographer.php">
									
									<td style="display: none;"><input readonly=""  type="text" class="form-control" name="evid" value="<?php echo $row['event_id'] ?>"></td>
									
									<td><input readonly=""  type="text" class="form-control" name="uname" value="<?php echo $row['usr_name'] ?>"></td>

									<td style="display: none;"><input readonly=""  type="text" class="form-control" name="uphno" value="<?php echo $row['usr_phno'] ?>"></td>

									<td><input readonly=""  type="text" class="form-control" name="etype" value="<?php echo $row['event_type'] ?>"></td>

									<td style="display: none"><input readonly=""  type="text" class="form-control" name="eplace" value="<?php echo $row['event_place'] ?>"></td>

									<td style="display: none"><input readonly=""  type="text" class="form-control" name="edate" value="<?php echo $row['eve_book_date'] ?>"></td>
                                    
                                    <td><input readonly=""  type="text" class="form-control" name="sdate" value="<?php echo $row['strt_date'] ?>"></td>
                                             
                                  	<td><input readonly=""  type="text" class="form-control" name="stime" value="<?php echo $row['strt_time'] ?>"></td>

                                   	<td><input readonly=""  type="text" class="form-control" name="edate" value="<?php echo $row['end_date'] ?>"></td>
                                 
                                    <td><input readonly=""  type="text" class="form-control" name="etime" value="<?php echo $row['end_time'] ?>"></td>
                                    
                            		<td>
										<?php
												$evid=$row['event_id'];
												$qry_select_status=mysql_query("SELECT * FROM `event_book_list` WHERE `event_id`='$evid'");
												$row_status=mysql_fetch_array($qry_select_status);
												$status=$row_status['status'];
												if ($status=="pending") 
												{
											?>
													<a class="btn btn-success"  href="assign_photographer.php?evid=<?php echo $row['event_id']?>">Assign</a><br><br>
													<a class="btn btn-warning" href="view_event.php?cancel_event_id=<?php echo $row['event_id']?>">Cancel</a>
											<?php
													
												}
												else if ($status=="assigned") 
												{
												
											?>		
													<p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 47%;">Assigned</p><br>
													<a class="btn btn-info"  href="reassign_photographer.php?revid=<?php echo $row['event_id']?>">Re-Assign</a><br><br>
													<a class="btn btn-warning" href="view_event.php?cancel_event_id=<?php echo $row['event_id'] ?>">cancel</a>
											<?php 
												} 
												else if ($status=="cancelled") 
												{
											?>
													<p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 47%;">Cancelled</p>
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
										<td> <?php
												$evid=$row['event_id'];
												$qry_select_status=mysql_query("SELECT * FROM `event_book_list` WHERE `event_id`='$evid'");
												$row_status=mysql_fetch_array($qry_select_status);
											    $status1=$row_status['money_status'];
											    if($status1=="Amount Paid")
											    {
											 ?>
											     <p style="color: red; background-color: white;font-weight:700;font-size:14px;height: 47%;">Amount Paid</p>
											 <?php
											 	}
											 ?>
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