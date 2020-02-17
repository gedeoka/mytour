
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Agent Room's - Online Hotel Booking</title>
	<meta name="keywords" content="Travel, Hotel, Booking, Agency, Murah"/>
    <meta name="description" content="Booking Hotel Online Murah">
    <meta name="author" content="hoomey">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ============================================
		Fav and touch icons
	============================================= -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL;?>include/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL;?>include/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL;?>include/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL;?>include/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo URL;?>include/images/ico/favicon.png">
	<!-- ============================================
		CSS
	============================================= -->
    <link href="<?php echo URL;?>include/css/bootstrap.css" rel="stylesheet" media="all" />
	<link href="<?php echo URL;?>include/css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URL;?>include/css/font-awesome.css" type="text/css" rel="stylesheet" media="all" />
	<link href="<?php echo URL;?>include/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<link href="<?php echo URL;?>include/css/features.css" rel="stylesheet" media="all" />
    <link href="<?php echo URL;?>include/css/main.css" rel="stylesheet" media="all" />
	<link href="<?php echo URL;?>include/css/responsive.css" rel="stylesheet" media="all" />
	<!--google font-->
        <script type="text/javascript" src="<?php echo URL;?>include/js/jquery-1.10.2.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,200,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,100,500,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>
       <?php
       //if (isset($this->show)=="search"){
           ?>
           <!-- font libs -->
		
		<!-- demo page styles -->
		<link href="<?php echo URL;?>include/css/jplist.demo-pages.min.css" rel="stylesheet" type="text/css" />
				
		
		
		<!-- jPList core js and css  -->
		<link href="<?php echo URL;?>include/css/jplist.core.min.css" rel="stylesheet" type="text/css" />		
		<script src="<?php echo URL;?>include/js/jplist.core.min.js"></script>
				
		<!-- jPList sort bundle -->
		<script src="<?php echo URL;?>include/js/jplist.sort-bundle.min.js"></script>
		
		<!-- jPList textbox filter control -->
		<script src="<?php echo URL;?>include/js/jplist.textbox-filter.min.js"></script>
		<link href="<?php echo URL;?>include/css/jplist.textbox-filter.min.css" rel="stylesheet" type="text/css" />
		
		<!-- jPList pagination bundle -->
		<script src="<?php echo URL;?>include/js/jplist.pagination-bundle.min.js"></script>
		<link href="<?php echo URL;?>include/css/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />		
		
		<!-- jPList history bundle -->
		<script src="<?php echo URL;?>include/js/jplist.history-bundle.min.js"></script>
		<link href="<?php echo URL;?>include/css/jplist.history-bundle.min.css" rel="stylesheet" type="text/css" />
		
		<!-- jPList toggle bundle -->
		<script src="<?php echo URL;?>include/js/jplist.filter-toggle-bundle.min.js"></script>
		<link href="<?php echo URL;?>include/css/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" />
		
		<!-- jPList views control -->
		<script src="<?php echo URL;?>include/js/jplist.views-control.min.js"></script>
		<link href="<?php echo URL;?>include/css/jplist.views-control.min.css" rel="stylesheet" type="text/css" />
		
		<!-- jPList start -->
		
           <?php
      // }
       ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
  </head>

  <body>
    <div id="home" class="body-wrapper">
    <div class="little-head">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="logo">
                    <a href="<?php echo URL; ?>ina"><img src="<?php echo URL; ?>include/images/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="little-menu">
                    <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            Indonesian <span class="icon-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo URL."ina";?>">Indonesian</a></li>
                                    <li><a href="<?php echo URL."eng";?>">English</a></li>
                                    <li><a href="<?php echo URL."chn";?>">Chinese</a></li>
                            </ul>
                    </div>
                    <div class="btn-group">
                        
                        <button id="curbot" type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            IDR <span class="icon-angle-down"></span>
                            </button>
                        <ul class="dropdown-menu" role="menu">
                                    <li id="usd" ><a href="#">USD</a></li>
                                    <li id="idr" ><a href="#">IDR</a></li>
                                    <li id="rmb" ><a href="#">RMB</a></li>
                            </ul>
                    </div>
                    <a href="#login" title="Open Modal window" data-toggle="modal" class="btn">Login</a>


                    <div aria-hidden="true" aria-labelledby="login" role="dialog" tabindex="-1" class="modal fade" id="login" style="display: none;"><!-- MODAL STARTS -->
                            <div class="modal-dialog">
                                    <div class="modal-content">

                                            <div class="modal-header"><!-- modal header -->
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="icon-remove"></i></button>
                                                    <h4 class="modal-title"><i class="icon-signin"></i>Login</h4>
                                            </div>

                                            <div class="modal-body"><!-- modal body -->
                                                <form role="form" method="POST" action="<?php echo URL."login/run"?>">
                                                            <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" name="login" class="form-control" placeholder="Username">
                                                            </div>
                                                            <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                            </div>


                                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                                                    </form>

                                                    <a href="#" style="font-size: 13px">Lupa Sandi?</a>
                                            </div>
                                    </div>
                            </div>
                    </div>		
                </div><!-- end little-menu -->
                <div class="call-us">Hubungi Kami di : (+62) 361 - XXXXXX
                </div>	
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end little head -->
<div class="main-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trip-search">

                    <div class="tab_container">									
                        <div id="hotel-tab" class="tab_content trip-form1">                            
                            <form role="form" id="myForm" action="<?php echo URL; ?>ina/search/" method="GET">
                                <div class="normal">
                                    <div class="form-group">
                                        <label for="place">Nama Lokasi / Hotel Tujuan <span class="star"></span></label>
                                        <input type="text" name="place" class="form-control" id="place" placeholder="Where you want to stay">
                                    </div>
                                </div>
                                <div class="datepicker-wrapper">	
                                    <div class="form-group datepicker-wrapper">
                                        <label for="check-in-hotel">Check-in <span class="star"></span></label>
                                        <input required type="text" name="checkin" class="form-control date" id="check-in-hotel" placeholder="dd/mm/yy" onchange="convert()">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                                <div class="select">
                                        <div class="form-group">
                                                <label for="adults-hotel">Malam <span class="star"></span></label>
                                                <select name="malam" class="form-control mySelectBoxClass" id="malam" onchange="convert()">
                                                    <option selected value="1">1 </option>
                                                    <?php
                                                    for ($h=2;$h<=15;$h++){
                                                        echo "<option value='".$h."'>".$h." </option>";
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                </div>
                                <div class="normal">
                                    <div class="form-group">
                                        <label for="place">CheckOut <span class="star"></span></label>
                                        <input type="text" name="checkout" class="form-control" id="checkout" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="cur" id="cur" value="IDR">
                                
                                <div class="link">
                                    <a href="#" style="line-height: 30px; font-size: 13px;">&nbsp;</a>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="icon-search icon-flip-horizontal"></i> Search
                                    </button>
                                </div>
                            </form>                                       
                        </div>

                    </div>	
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>


</div><!-- /main-wrapper -->
<!-- SLIDER -->
<div class="slider-1 clearfix">

    <div class="flex-container">
        <div class="flexslider loading">
            <ul class="slides">
                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-01.jpg) no-repeat;background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-02.jpg) no-repeat; background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-03.jpg) no-repeat; background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

            </ul>
        </div>
    </div>
</div><!-- End slider -->


<div class="main-wrapper">

    <div class="container">
        <div class="row">
            
        </div>
    </div>

    <div class="clear"></div>


</div><!-- /main-wrapper -->
<script>
$(document).ready(function() {
   
    $("#check-in-hotel").change(function(e) {
        convert();
    })
    $("#malam").change(function(e) {
        convert();
    })
    $("#idr").click(function(e) {
        document.getElementById('cur').value = "IDR";
        $("#curbot").empty();
        $("#curbot").append("IDR <span class='icon-angle-down'></span>");
    })
    $("#usd").click(function(e) {
        document.getElementById('cur').value = "USD";
        $("#curbot").empty();
        $("#curbot").append("USD <span class='icon-angle-down'></span>");
    })
    $("#rmb").click(function(e) {
        document.getElementById('cur').value = "RMB";
        $("#curbot").empty();
        $("#curbot").append("RMB <span class='icon-angle-down'></span>")
    })
    
});
</script>

	<!-- JavaScript
    ================================================== -->
    
	<script type="text/javascript" src="<?php echo URL;?>include/js/initialize-google-map.js"></script>
	
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery.plugins.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery.customs.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>include/js/jquery.flexslider.js"></script> 
	<script type="text/javascript" src="<?php echo URL;?>include/js/flex-slider.js"></script> 
	
  </body>
</html>
