<?php
include 'connection.php';
 if (!isset($_SESSION['employee'])) 
{
		header('Location:index.php');
}

if (isset($_POST['btn_add_product'])) 
{
	$cname=$_POST['cname'];
	$cadd=$_POST['cadd'];
    $cphno=$_POST['cphno'];
    $cemail=$_POST['cemail'];
    $tday=date("Y-m-d");
    $cid=$_POST['cid'];
    $did=$_POST['did'];
    $pqty=$_POST['pqty'];
    $psize=$_POST['psize'];
    $prod_date=date("Y-m-d ");
    $user_id = $_SESSION['employee'];

    $qry_design=mysql_query("SELECT design_name,design_price FROM `prod_design_details` where `design_id`='$did'");
        while ($row=mysql_fetch_array($qry_design)) 
            {
                    $price=$row['design_price'];
                    $dname=$row['design_name'];
            }
    $qry_category=mysql_query("SELECT cat_name FROM `prod_cat_details` where `cat_id`='$cid'");
        while ($row=mysql_fetch_array($qry_category)) 
            {
                    $ctname=$row['cat_name'];
            }
    $tot_amt=$price*$pqty;
   
	$qry_insert=mysql_query("INSERT INTO `prod_ordered_list`(`prod_ord_id`, `usr_id`, `usr_name`, `usr_address`, `usr_phno`, `usr_email`, `cat_id`, `cat_name`, `design_id`, `design_name`, `prod_ord_quantity`, `prod_ord_price`, `prod_ord_date`, `prod_ord_size`, `prod_ord_tot_amt`, `prod_status`, `status`) VALUES ('','$user_id','$cname','$cadd','$cphno','$cemail','$cid','$ctname','$did','$dname','$pqty','$price','$prod_date','$psize','$tot_amt','Pending','')");

		if ($qry_insert) 
		{
			echo "<script>
					alert('Your order placed successfully and you have to pay  '+ $tot_amt + ' Rs');
					window.location='product_order.php';		
				</script>";
		}
		else
		{
			
			echo "<script>
					alert('Sorry,Try Again...!');			
					window.location='studio_manager.php';		
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
<body style="background:url('images/butter.jpg');background-size: cover;">
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
								<li><a href="studio_manager.php"> <i class="fa fa-home"></i> Home</a></li>
								<li><a href="product_order.php"> <i class="fa fa-empire"></i>Product Order</a></li>
								<li><a href="event_registration.php"> <i class="fa fa-gift"></i>Booking Event</a></li>
								<li><a href="view_std_task.php"><i class="fa fa-server"></i>View Tasks</a></li>
								<li><a href="std_salary_details.php"> <i class="fa fa-envira"></i> Salary Details</a></li>
								<li><a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>STUDIO MANAGER PAGE </a></h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><img src="images/admin.jpg" alt=""> </span> 
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
						    <li><a href="studio_manager.php">Home</a></li>
						    <li class="active"><a href="#">Place Product Order</a></li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->
<!-- start of product ordering details-->
								
	<div class="inner_content_w3_agile_info two_in">
		<div class="forms-main_agileits" >
				<div class="wthree_general graph-form agile_info_shadow " style="width:50%; text-align:center;">
					<h3 class="w3_inner_tittle two">Place Product Order </h3>
						<div class="grid-1 ">
							<div class="form-body">
								<form class="form-horizontal" method="post" action="product_order.php" enctype="multipart/form-data">

									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control lock" name="cname" id="focusedinput" placeholder="Name of the Customer" required="" pattern="[a-zA-Z\s]+" title="Please enter characters only">
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
													<input type="text" class="form-control lock" name="cadd" id="focusedinput" placeholder="Address of the Customer" required="">
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
													<input type="text" name="cphno" class="form-control lock" id="focusedinput" placeholder="Phone Number of Customer" required="" pattern="[0-9]{10}" title="Please enter only 10 digits">
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
													<input type="Email" class="form-control lock" name="cemail" id="focusedinput" placeholder="Email of the Customer" required="">
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
													<select id="category" name="cid" class="form-control lock" required="" onchange="showHint(this.value)">
					                                   <option value="">Select Category Name</option>
					                                        <?php
					                                            $qry_category=mysql_query("SELECT * FROM `prod_cat_details`");
					                                                while ($row=mysql_fetch_array($qry_category)) 
					                                                {
					                                        ?>
					                                                <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
					                                        <?php
					                                                }
					                                        ?>
					                                </select>
						                        </div>
						                    </div>
						            </div>
						            
				                    <div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-gift"></i>
													</span>
													 <select id="design" class="form-control lock" name="did" required="">    
    													<option value="">Select Design Name</option>


                                					</select>
												</div>
											</div>
									</div>

						<script>
                            function showHint(str) 
                            {
                              var xhttp;
                              if (str.length == 0) { 
                                document.getElementById("design").innerHTML = "";
                                return;
                              }
                              xhttp = new XMLHttpRequest();
                              xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                  document.getElementById("design").innerHTML = this.responseText;
                                }
                              };
                              xhttp.open("GET", "gethint.php?q="+str, true);
                              xhttp.send();   
                            }
                        </script>

				                    <div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envira"></i>
													</span>
													<input type="text" class="form-control lock" name="pqty" id="focusedinput" placeholder="How Much You Want?" required="" pattern="[0-9]+" title="Please enter digits only">
												</div>
											</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-paperclip"></i>
													</span>
													<select id="cat" name="psize" class="form-control lock" required="">
					                                    <option value=" ">Select Size</option>
					                                    <option value="Large">LARGE</option>
					                                    <option value="Medium">MEDIUM</option>
					                                    <option value="Small">SMALL</option>
					                                </select>
												</div>
											</div>
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-4 control-label"></label>
											<div class="col-sm-4">														<button type="submit" class="btn btn-default" name="btn_add_product">	Add Now</button>
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
	<!-- /amcharts -->
				<script src="js/amcharts.js"></script>
		       <script src="js/serial.js"></script>
				<script src="js/export.js"></script>	
				<script src="js/light.js"></script>
				<!-- Chart code -->
	 <script>
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "Japan",
        "visits": 1809,
        "color": "#FF9E01"
    }, {
        "country": "Germany",
        "visits": 1322,
        "color": "#FCD202"
    }, {
        "country": "UK",
        "visits": 1122,
        "color": "#F8FF01"
    }, {
        "country": "France",
        "visits": 1114,
        "color": "#B0DE09"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }, {
        "country": "Spain",
        "visits": 711,
        "color": "#0D8ECF"
    }, {
        "country": "Netherlands",
        "visits": 665,
        "color": "#0D52D1"
    }, {
        "country": "Russia",
        "visits": 580,
        "color": "#2A0CD0"
    }, {
        "country": "South Korea",
        "visits": 443,
        "color": "#8A0CCF"
    }, {
        "country": "Canada",
        "visits": 441,
        "color": "#CD0D74"
    }, {
        "country": "Brazil",
        "visits": 395,
        "color": "#754DEB"
    }, {
        "country": "Italy",
        "visits": 386,
        "color": "#DDDDDD"
    }, {
        "country": "Taiwan",
        "visits": 338,
        "color": "#333333"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0

    },
    "export": {
    	"enabled": true
     }

}, 0);
</script>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv1", {
    "type": "serial",
	"theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
		"useGraphSettings": true,
		"markerSize": 10
    },
    "dataProvider": [{
        "year": 2017,
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 0.3,
        "meast": 0.2,
        "africa": 0.1
    }, {
        "year": 2016,
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }, {
        "year": 2015,
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.5,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Europe",
        "type": "column",
		"color": "#000000",
        "valueField": "europe"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "North America",
        "type": "column",
		"color": "#000000",
        "valueField": "namerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Asia-Pacific",
        "type": "column",
		"color": "#000000",
        "valueField": "asia"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Latin America",
        "type": "column",
		"color": "#000000",
        "valueField": "lamerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Middle-East",
        "type": "column",
		"color": "#000000",
        "valueField": "meast"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Africa",
        "type": "column",
		"color": "#000000",
        "valueField": "africa"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>

	<!-- //amcharts -->
		<script src="js/chart1.js"></script>
				<script src="js/Chart.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
			<!-- script-for-menu -->

<!-- /circle-->
	 <script type="text/javascript" src="js/circles.js"></script>
					         <script>
								var colors = [
										['#ffffff', '#fd9426'], ['#ffffff', '#fc3158'],['#ffffff', '#53d769'], ['#ffffff', '#147efb']
									];
								for (var i = 1; i <= 7; i++) {
									var child = document.getElementById('circles-' + i),
										percentage = 30 + (i * 10);
										
									Circles.create({
										id:         child.id,
										percentage: percentage,
										radius:     80,
										width:      10,
										number:   	percentage / 1,
										text:       '%',
										colors:     colors[i - 1]
									});
								}
						
				</script>
	<!-- //circle -->
	<!--skycons-icons-->
<script src="js/skycons.js"></script>
<script>
									 var icons = new Skycons({"color": "#fcb216"}),
										  list  = [
											"partly-cloudy-day"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
								<script>
									 var icons = new Skycons({"color": "#fff"}),
										  list  = [
											"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
<!--//skycons-icons-->
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
		<script src="js/flipclock.js"></script>
	
	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			
			clock = $('.clock').FlipClock({
		        clockFace: 'HourlyCounter'
		    });
		});
	</script>
<script src="js/bars.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>