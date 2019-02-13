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
        font-weight: 900;
        font-size: 15px;
        color:#D2C8C8;
        text-align: left;
    }
</style>
</head>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
  </script>
  <body  style="background:url('images/butter.jpg');background-size: cover;">
<!-- banner
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
               
<div class="inner_content">
<div class="inner_content_w3_agile_info two_in" >
    <div class="forms-main_agileits" style="background-color:black;width:40%; margin:auto;">
        <div class="graph-form agile_info_shadow" >
            <h3 class="w3_inner_tittle two">----BILL RECEIPT----</h3>
                <div class="form-group" id="printablediv">
                   <?php
                        $oid=$_GET['eid'];
                        $select=mysql_query("SELECT * FROM `event_book_list` WHERE `event_id`='$oid'");
                        $row=mysql_fetch_array($select);
                        $user_id=$row['usr_id'];    
                        $user_name=$row['usr_name'];
                        $user_address=$row['usr_address'];
                        $etype=$row['event_type'];
                        $total_amt=15000;
                    ?>
                    <p> User Name        : <?php echo $user_name ?></p> 
                    <p> User Address     : <?php echo $user_address ?></p>
                    <p> Event            :  <?php echo $etype ?></p>
                    <p> Total Amount     :  <?php echo $total_amt?></p> 
                </div>
                <div class="form-group">
                            <button type="submit" class="btn btn-default" name="btn_add_print" value="Print 1st Div" onclick="javascript:printDiv('printablediv')">Print</button>
                </div>

                </div>
        </div>

    <!--//forms-->                                      
    <!--//forms-->                                  
                </div>

        </div>

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
                                        number:     percentage / 1,
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