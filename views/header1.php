<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php /* ?><title>Welcome to Abrahamtourgroup.com</title> */?>
<title>	<?php
switch ($this->trs) {
    case "tr":
        echo  $this->single[0]["TourName"];
        break;
	case "hm":
        echo  $this->single[0]["TourName"];
        break;
    case "yg":
        echo  $this->single[0]["YogaName"];
        break;
    case "wd":
        echo  $this->single[0]["WeddingName"];
        break;
	case "ht":
        echo  $this->single[0]["Name"];
		//echo "Hotel Name";
        break;
}


	?> :: APATOUR.com</title>
<meta charset="UTF-8">
  <meta name="description" content="<?php 	echo substr(strip_tags($this->single[0]["Desk"]),0,300);?> ">
  <meta name="keywords" content="<?php 	echo Code::GetField('settings','Value',"ID=5");?>">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/animate.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/owl.theme.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/prettyPhoto.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/smoothness/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>rs-plugin/css/settings.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/theme.css">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/colors/turquoise.css" id="switch_style">
<link rel="stylesheet" href="<?php echo URL."asset/";?>css/responsive.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

<!-- Javascripts --> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/bootstrap-hover-dropdown.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery.nicescroll.js"></script>  
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery-ui-1.10.4.custom.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery.jigowatt.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery.sticky.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/waypoints.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/switch.js"></script> 
<script type="text/javascript" src="<?php echo URL."asset/";?>js/custom.js"></script> 
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>


<body>
<?php /*?>
<!-- Top header -->
<div id="top-header">
  <div class="container">
    <div class="row">
      
      <div class="col-xs-12">
        <div class="th-text pull-right">
		<div class="th-item"> <a href="#"><i class="fa fa-phone"></i> +62 361 9003829</a> </div>
          <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> info@abrahamtourgroup.com </a></div>
          <div class="th-item">
            <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php */?>
<!-- Header -->
<header>
  <!-- Navigation -->
  <div class="navbar yamm navbar-default" id="sticky">
    <div class="container">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="<?php echo URL;?>" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo"> <img id="default-logo" src="<?php echo URL."asset/";?>images/logo.png"  style="height:44px;"> <img id="retina-logo" src="<?php echo URL."asset/";?>images/logo-retina.png"  style="height:44px;"> APA Tour</div>
        </a> </div>
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown active"> <a href="<?php echo URL;?>">Home</a>
          </li>
		  <li class="dropdown active"> <a href="<?php echo URL;?>pages/hotel">Hotel</a>
          </li>	
		   <?php
echo $this->HMenu;		  
			?>
			<li class="dropdown active"> <a href="<?php echo URL;?>pages/tiket">Tiket</a>
            </ul>
          </li>
		  <!--- <li><a href="<?php //echo URL."lists/?umroh";?>">Umroh </a></li>
		  
          <li><a href="#">Contact</a></li> -->
          
        </ul>
      </div>
    </div>
  </div>
</header>