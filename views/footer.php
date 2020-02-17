<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
         <div class="navbar-header col-sm-12">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="<?php echo URL;?>" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo"> <img id="default-logo" src="<?php echo URL."asset/";?>images/logo.png" style="width :auto;height:50px;">
		
		</div>
        </a> </div>
       
        <address>
        <strong>PT. APA Tour Group</strong><br>
        Jalan Tukad Yeh Aya no 135B, Lantai 2
<br>
        Denpasar - BALI<br>
        <abbr title="Phone">P:</abbr> <a href="#">(+62) 361 123-45678</a><br>
        <abbr title="Email">E:</abbr> <a href="#">info@apatour.com</a><br>
        <abbr title="Website">W:</abbr> <a href="#">www.apatour.com</a><br>
        </address>
      </div>
      <?php /*?>
      <div class="col-md-3 col-sm-3">
        <h4>Our Product</h4>
        <ul class="list">
		  <li><a href="<?php echo URL."lists/?honeymoon";?>">Tour Package</a></li>
          <li><a href="<?php echo URL."lists/?honeymoon";?>">Honeymoon </a></li>
		  <li><a href="<?php echo URL."lists/?yoga";?>">Yoga </a></li>
		  <li><a href="<?php echo URL."lists/?wedding";?>">Wedding </a></li>
        </ul>
      </div>
	  <?php */?>
	  <div class="col-md-4 col-sm-4">
        <h4>About Us</h4>
        <ul class="list">
			<li><a href="<?php echo URL."contact";?>">Contact Us</a></li>
          
		<?php
		foreach ($this->pagelist as $page => $pages){
			
		?>
		<li><a href="<?php echo URL."page/?pages=".$pages["slugs"];?>"><?php echo $pages["ContentTitle"];?> </a></li>
		<?php }?>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4">
        <h4>Follow Us On</h4>
		<div class="th-item">
            <div class="social-icons"> 
				<a href="https://www.facebook.com/AbrahamTourTravelAgentEventOrganizer/"><i class="fa fa-facebook"></i> facebook</a><br> 
				<a href="https://www.instagram.com/abrahamjayagroup/"><i class="fa fa-instagram"></i> Instagram</a><br>
				<a href="https://www.youtube.com/channel/UC8-cp5rIEQQ2sNAssMJgjJA"><i class="fa fa-youtube-play"></i> Youtube</a><br>
				<a href="https://twitter.com/AbrahamTour"> <i class="fa fa-twitter"></i> Twitter</a><br>
				<a href="https://plus.google.com/+AbrahamTour"> <i class="fa fa-google-plus"></i> Google+</a> </div>
          </div>
        
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-6"> &copy; 2018 All Rights Reserved </div>
        <div class="col-xs-6 text-right">
          <ul>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
</html>