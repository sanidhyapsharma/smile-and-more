<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) 
{
	header('Location:index.php');
}

if (isset($_POST['btn_add_design'])) 
{
	$cname=$_POST['cname'];
	$dname=$_POST['dname'];
	$dtitle=$_POST['dtitle'];
	$dprice=$_POST['dprice'];
	$doupdate=date("Y-m-d ");
	$ddescription=$_POST['ddescription'];

	//Image storing code
	$file = rand(1000,100000)."-".$_FILES['photo']['name'];
    $file_loc = $_FILES['photo']['tmp_name'];
    $file_size = $_FILES['photo']['size'];
    $file_type = $_FILES['photo']['type'];
    $folder="profiles/";
    // new file size in KB
    $new_size = $file_size/2048;  
    // new file size in KB
    
    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case
    
    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {// Start of if image file upload successful

		$qry_insert=mysql_query("INSERT INTO `prod_design_details`(`design_id`,`cat_id`, `design_name`, `design_title`,`design_photo`, `design_price`,`design_upload_date`,`design_description`) VALUES ('','$cname','$dname','$dtitle','$final_file','$dprice','$doupdate','$ddescription')");
		if ($qry_insert) 
		{
			echo "<script>
					alert('Design Details are Added Successfully!...');			
					window.location='view_design.php';		
				</script>";
		}
		else
		{
			
			echo "<script>
					alert('Design Details doesnot Added,Try Again!...');			
					window.location='add_design.php';		
				</script>";
				 
		}
	}
	else
	{
		echo "<script>
					alert('Image not supported.');			
					window.location='add_design.php';		
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
						    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Category<span class="caret"></span></a>
							    <ul class="dropdown-menu">
							    	<li><a href="add_category.php">Add Category</a></li>
							        <li><a href="view_category.php">View Details</a></li>
							    </ul>
							</li>
							<li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Design<span class="caret"></span></a>
							    <ul class="dropdown-menu">
							        <li><a href="view_design.php">View Details</a></li>
							    </ul>
							</li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->
	<div class="inner_content_w3_agile_info two_in">
		<div class="forms-main_agileits" >
				<div class="wthree_general graph-form agile_info_shadow " style="background: url('images/images(13).jpg');background-size:cover; width:70%; text-align:center;">
					<h3 class="w3_inner_tittle two">ADD PRODUCT DESIGNS DETAILS</h3>
						<div class="grid-1 ">
							<div class="form-body">
								<form class="form-horizontal" method="post" action="add_design.php" enctype="multipart/form-data">

								    <div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">Product Category Name</label>
											<div class="col-sm-8">
												<select name="cname" id="selector1" class="form-control1" required="">
												<!--<select id="branch" class="form-control1" name="bname" required="">-->
													<option class="form-control1" style="align-content: center;" value="">Select Product Category</option>
														<?php
															$qry_cat=mysql_query("SELECT * FROM `prod_cat_details`");
															while ($row=mysql_fetch_array($qry_cat)) 
		      	    											{						
														?>
															<option value="<?php echo $row['cat_id']; ?>">
															<?php echo $row['cat_name']; ?>
															</option>													
														<?php												
														      	}
														?>
												</select>
											</div>
									</div>
									
                                   <div class="form-group">
                        				<label for="focusedinput" class="col-sm-3 control-label">Design Name</label>
				                           	<div class="col-sm-8">
				                                <input type="text" class="form-control1" name="dname" id="focusedinput" placeholder="Category Design Name" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only">
				                            </div>
				                    </div>
                    
									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">Design Title</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="dtitle" id="focusedinput" placeholder="Title of the Design" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only">
											</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">Design Picture</label>
											<div class="col-sm-8">
												<input type="file" class="form-control1" name="photo" id="focusedinput" placeholder="Select the Picture" required=""  >
											</div>
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">Design Price</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="dprice" id="focusedinput" placeholder="Cost of this Design" required="" pattern="[0-9]+" title="Please enter numbers only" >
											</div>
									</div>
									
									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">Description</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" name="ddescription" id="focusedinput" placeholder="Describe the Product" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only" >
											</div>
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label"></label>
											<div class="col-sm-8">														<button type="submit" class="btn btn-default" name="btn_add_design">	Add Design</button>
											</div>
									</div>
								</form>
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