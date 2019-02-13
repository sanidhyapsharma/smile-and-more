<?php
include 'connection.php';
 if (!isset($_SESSION['employee'])) 
{
		header('Location:index.php');
}


if (isset($_POST['btn_add_event'])) 
{
    $event_type=$_POST['event_type'];
	$cname=$_POST['cname'];
	$cadd=$_POST['cadd'];
    $cphno=$_POST['cphno'];
    $cemail=$_POST['cemail'];
    $eplace=$_POST['eplace'];
    $tday=date("Y-m-d");
    $edate=$_POST['edate'];
    $etime=$_POST['etime'];
    $sdate=$_POST['sdate'];
    $stime=$_POST['stime'];
    
if($sdate>date("Y-m-d") && $edate>$sdate)
{
    
   $user_id = $_SESSION['emp_type'];
    
    $qry_insert_event=mysql_query("INSERT INTO `event_book_list`(`event_id`, `usr_id`, `usr_name`, `usr_address`, `usr_phno`, `usr_email`, `event_type`, `event_place`, `eve_book_date`, `strt_date`, `strt_time`, `end_date`, `end_time`, `status`, `money_status`) VALUES ('','$user_id','$cname','$cadd','$cphno','$cemail','$event_type','$eplace','$tday','$sdate','$stime','$edate','$etime','pending','')");

    $select_event_id=mysql_query("SELECT `event_id` FROM `event_book_list` ORDER BY `event_id` DESC LIMIT 1 ");
    $row_id =mysql_fetch_array($select_event_id);
    $last_event_id=$row_id['event_id'];
    echo "$last_event_id";

   if($event_type=='wedding')
   {
         $bride_name=$_POST['bride_name'];
         $groom_name=$_POST['groom_name'];
         $mdate=$_POST['mdate'];

        $qry_insert=mysql_query("INSERT INTO `marriage_event`(`event_id`, `usr_id`, `usr_name`, `usr_add`, `usr_phno`, `usr_email`, `event_type`, `groom_name`, `bride_name`, `mrg_date`, `event_place`, `strt_date`, `strt_time`, `end_date`, `end_time`) VALUES ('$last_event_id','$user_id','$cname','$cadd','$cphno','$cemail','$event_type','$groom_name','$bride_name','$mdate','$eplace','$sdate','$stime','$edate','$etime')");
        	
        if ($qry_insert) 
        {
            echo "<script>
                    alert('Registration Successful!');            
                   window.location='event_registration.php';     
                </script>";
        }
        else
        {
            echo "<script>,
                    alert('Cannot Book the Event,Try Again.!');            
                   window.location='event_registration.php';     
                </script>";
                 
        }
    }
    else if($event_type=='birthday')
    {
        $bname=$_POST['bname'];
        $bdate=$_POST['bdate'];

        $qry_insert=mysql_query("INSERT INTO `birthday_event`(`event_id`, `usr_id`, `usr_name`, `usr_address`, `usr_phno`, `usr_email`, `event_type`, `bir_name`, `bir_date`, `event_place`, `strt_date`, `strt_time`, `end_date`, `end_time`) VALUES ('$last_event_id','$user_id','$cname','$cadd','$cphno','$cemail','$event_type','$bname','$bdate','$eplace','$sdate','$stime','$edate','$etime')");

        if ($qry_insert) 
        {
             echo "<script>
                    alert('Registration Successful!');            
                   window.location='event_registration.php';     
                </script>";
        }
        else
        {
            echo "<script>
                    alert('Cannot Book the Event,Try Again.!');            
                    window.location='event_registration.php';     
                </script>";
        }
    }
    else if($event_type=='other')
    {
    	$othere=$_POST['othere'];

        $qry_insert=mysql_query("INSERT INTO `other_event`(`event_id`, `usr_id`, `usr_name`, `usr_address`, `usr_phno`, `usr_email`, `event_type`, `other_event_name`, `event_place`, `strt_date`, `strt_time`, `end_date`, `end_time`) VALUES ('$last_event_id','$user_id','$cname','$cadd','$cphno','$cemail','$event_type','$othere','$eplace','$sdate','$stime','$edate','$etime')");

        if ($qry_insert) 
        {
          echo "<script>
                   alert('Registration Successful!');            
                   window.location='event_registration.php';     
                </script>";
        }
        else
        {
          echo "<script>
                   alert('Cannot Book the Event,Try Again.!');            
                   window.location='event_registration.php';     
                </script>";
        }

    }

    }
    else
    {
        echo "<script>
                    alert('Please enter valid date,Try Again.!');            
                    window.location='event_registration.php';     
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
						    <li ><a href="studio_manager.php">Home</a></li>
						    <li class="active" ><a href="event_registration.php">Event Registration</a></li>
						</ul>
				</div>
			</nav>	
	      <!-- //breadcrumbs -->

	<div class="inner_content_w3_agile_info two_in">
		<div class="forms-main_agileits" >
				<div class="wthree_general graph-form agile_info_shadow " style=" width:50%; text-align:center;">
					<h3 class="w3_inner_tittle two">EVENT REGISTRATION</h3>
						<div class="grid-1 ">
							<div class="form-body">
								<form class="form-horizontal" method="post" action="event_registration.php" enctype="multipart/form-data">

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
						                                <select id="event" class="form-control lock" name="event_type" required="" onchange='showhint(this.value)'>
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
				                                         toAppend = "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-male'></i></span><input type='text' class='form-control lock' name='groom_name' placeholder='Name of the Groom, For ex:Mr.Hrithik' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-female'></i></span><input type='text' class='form-control lock' name='bride_name' placeholder='Name of the Bride, For ex:Ms/Mrs.Seetha' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='date' class='form-control lock' name='mdate' placeholder='06/07/1997' required=''></div></div></div>"; 
				                                         divv.innerHTML=toAppend;
				                             }
				                             else if (value == 'birthday') 
				                             {
				                                toAppend = "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-gift'></i></span><input type='text' class='form-control lock' name='bname' placeholder='ex:rahul/priya' required=''></div></div></div><div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='date' class='form-control lock' name='bdate' placeholder='06/07/1997' required=''></div></div></div>"; 

				                                         divv.innerHTML=toAppend;
				                             }
				                             else if (value=='other') 
				                             {
				                                    toAppend =  "<div class='form-group'><label class='col-md-2 control-label'></label><div class='col-md-8'><div class='input-group'><span class='input-group-addon'><i class='fa fa-envira'></i></span><input type='text' class='form-control lock' name='othere' placeholder='Name Of the Event' required=''></div></div></div>";
				                                     divv.innerHTML=toAppend;
				                             }
				                        }
				                    </script>

				                    <div class="form-group">
										<label class="col-md-2 control-label"></label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-map"></i>
													</span>
													<input type="text" class="form-control lock" name="eplace" id="focusedinput" placeholder="Address of event celebration" required="">
												</div>
											</div>
									</div>
				               
				               	<h2 class="w3_inner_tittle two">Event Starting Date/Time </h2>

								<div class="form-group">
                               		<label class="col-md-2 control-label"></label>
                               			<div class="col-md-8">
                               				<div class="input-group agileits_w3layouts_main_gridl">
                               					<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
                                    			<input class="date form-control lock" id="userdate" name="sdate" type="date" required="">
                               				</div>
                               				<div class="input-group agileits_w3layouts_main_gridr">
												<span class="input-group-addon">
														<i class="fa fa-clock-o"></i>
												</span>
                                    			 <input type="time" name="stime" class="form-control lock" placeholder=" " required="" >
                               				</div>
                               			</div>
                               	</div>

				               	<h2 class="w3_inner_tittle two">Event Ending Date/Time </h2>
                               	
                               	<div class="form-group">
                               		<label class="col-md-2 control-label"></label>
                               			<div class="col-md-8">
                               				<div class="input-group agileits_w3layouts_main_gridl">
                               					<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
                                    			<input class="date form-control lock" id="userdate" name="edate" type="date" required="">
                               				</div>
                               				<div class="input-group agileits_w3layouts_main_gridr">
												<span class="input-group-addon">
														<i class="fa fa-clock-o"></i>
												</span>
                                    			 <input type="time" name="etime" class="form-control lock" placeholder=" " required="" >
                               				</div>
                               			</div>
                               	</div>
                               	
									<div class="form-group">
										<label for="focusedinput" class="col-sm-4 control-label"></label>
											<div class="col-sm-4">														<button type="submit" class="btn btn-default" name="btn_add_event">	Add Now</button>
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
