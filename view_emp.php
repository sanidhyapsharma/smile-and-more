<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) 
{
	header('Location:index.php');
}

// code to delete the employee

	if (isset($_GET['dei'])) 
	{
		$dei=$_GET['dei'];
		$qry_delete=mysql_query("DELETE FROM `emp_details` WHERE `emp_id`='$dei'")	;
		if ($qry_delete) 
		{
			echo "<script>
				alert('Employee Details has been Deleted Successfully!...');			
				window.location='view_emp.php';		
			</script>";
		}
		else
		{
			echo "<script>
				alert('Employee Details doesnot Deleted,Try Again.!');			
				window.location='view_emp.php';		
			</script>";
		}
	}

	// code to update the employee
	if (isset($_POST['btn_update_emp'])) 
	{
		$eid=$_POST['eid'];
		$ename=$_POST['ename'];
		$ephone=$_POST['ephno'];
		$eaddress=$_POST['eaddress'];

		$qry_update=mysql_query("UPDATE `emp_details` SET `emp_name`='$ename',`emp_phno`='$ephone',`emp_address`='$eaddress' WHERE `emp_id` = '$eid'");

		if ($qry_update) 
        {
            echo "<script>
                alert('Changes in Employee Details has been Updated Successfully!..');            
                window.location='view_emp.php';      
            </script>";
        }
       else
       {
            echo "<script>
                alert('Changes in Employee Details doesnot Updated ');            
                window.location='view_emp.php';      
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
						    <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee Details<span class="caret"></span></a>
							    <ul class="dropdown-menu">
							        <li><a href="add_emp.php">Add Details</a></li>
							    </ul>
							</li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->
<!-- code for display the branch details -->
	<div class="inner_content_w3_agile_info two_in">
	    <div class="forms-main_agileits">
			<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(12).jpg');background-size:cover; width:100%; text-align:center;">
             	<h3 class="w3_inner_tittle two">Employees Details</h3>
					<table class="table table-hover">
                        <thead style="color:red; ">
                            <tr>
								<th>Employee Id </th>
								<th>Name</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Salary</th>
								<th></th>
								<th></th>
							</tr>
                        </thead>
                        <tbody>
                            <tr>
								<?php
									$qry_select=mysql_query("SELECT * FROM `emp_details`");
										while ($row=mysql_fetch_array($qry_select)) 
											{
								?>
								<form method="post" action="view_emp.php">
									<td><input readonly="" type="text" class="form-control" name="eid" value="<?php echo $row['emp_id'] ?>"></td>
                                    
									<td><input class="form-control" type="text" name="ename" value="<?php echo $row['emp_name'] ?>" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only"></td>

									<td><input class="form-control" type="text" name="ephno" value="<?php echo $row['emp_phno'] ?>" required="" pattern="[0-9]{10}" title="Please enter only 10 digits"></td>

									<td><textarea name="eaddress" class="form-control" required=""><?php echo $row['emp_address'] ?></textarea></td>
									
									<td><input readonly="" type="text" class="form-control" name="emp_salary" value="<?php echo $row['emp_salary'] ?>"</td>

									<td><a class="btn btn-danger" href="view_emp.php?dei=<?php echo $row['emp_id'] ?>"><i class="fa fa-trash"></a></td>

									<td><button type="submit" class="btn btn-success" name="btn_update_emp">Update </a></td>
								</form>
							</tr>
								<?php
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