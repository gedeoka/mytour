<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Product/Package</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL."admin/tour"?>"><i class="fa fa-circle-o"></i> Tour  </a></li>
			
			<li><a href="<?php echo URL."admin/tiket"?>"><i class="fa fa-circle-o"></i> Tiketing  </a></li>
			
			<li><a href="<?php echo URL."admin/tourtype"?>"><i class="fa fa-circle-o"></i> Tour Type  </a></li>
			
			<li><a href="<?php echo URL."admin/tourcat"?>"><i class="fa fa-circle-o"></i> TourCategory </a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Hotels/ Villa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL."admin/hotels"?>"><i class="fa fa-circle-o"></i> Hotel  </a></li>
			<li><a href="<?php echo URL."admin/rooms"?>"><i class="fa fa-circle-o"></i> Rooms  </a></li>
			<li><a href="<?php echo URL."admin/hotelfas"?>"><i class="fa fa-circle-o"></i> Hotel Fasility </a></li>		
			<li><a href="<?php echo URL."admin/hotelcat"?>"><i class="fa fa-circle-o"></i> Hotel Category  </a></li>
          </ul>
        </li>
	 
		<li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Data Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL."admin/Country"?>"><i class="fa fa-circle-o"></i> Country </a></li>
			<li><a href="<?php echo URL."admin/area"?>"><i class="fa fa-circle-o"></i> Area </a></li>
			<?php
        $usr =  Session::get('user');
			  if ($usr=="Administrator"){
			  ?>
			 
			  <li><a href="<?php echo URL."admin/user"?>"><i class="fa fa-circle-o"></i> User  </a></li>
			  <?php }?>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Web Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php /*?>
            <li><a href="<?php echo URL."admin/setCountry"?>"><i class="fa fa-circle-o"></i>Set Country to Front Page  </a></li>
			<?php */?>
			<li><a href="<?php echo URL."admin/frontpage"?>"><i class="fa fa-circle-o"></i> FrontPage Setting </a></li>
			<li><a href="<?php echo URL."admin/keyword"?>"><i class="fa fa-circle-o"></i>Keyword SEO Setting </a></li>
			<li><a href="<?php echo URL."admin/setArea"?>"><i class="fa fa-circle-o"></i> Set Area to FrontPage </a></li>
			<li><a href="<?php echo URL."admin/slider"?>"><i class="fa fa-circle-o"></i> Home Slide show  </a></li>
			<li><a href="<?php echo URL."admin/promo"?>"><i class="fa fa-circle-o"></i> set promo  </a></li>
			<li><a href="<?php echo URL."admin/popular"?>"><i class="fa fa-circle-o"></i> set Popular Package  </a></li>
			
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Page's</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL."admin/page"?>"><i class="fa fa-circle-o"></i> Pages </a></li>
			
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
			<li><a href="<?php echo URL."admin/tourbook"?>"><i class="fa fa-circle-o"></i> Travel Booking </a></li>
          </ul>
        </li>
        
        <li><a href="<?php echo URL."login/logout"?>"><i class="fa fa-circle-o text-yellow"></i> <span>LogOut</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>