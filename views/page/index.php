
<div class="container">
  <div class="row"> 
    <!-- Blog -->
    <section class="blog mt50">
      <div class="col-md-9"> 
        <!-- Article -->
        
          <div class="row">
            
            <div class="col-sm-11 col-xs-10 meta">
			
              <h2><?php echo $this->pages[0]["ContentTitle"];?></h2>
            <hr>
            <div class="col-md-12">
              <?php echo $this->pages[0]["Content"];?>
            </div>
          </div>
        
        
      </div>
    </section>
    
    <!-- Aside -->
    <aside class="mt50">
      <div class="col-md-3"> 
        <!-- Widget: Categories -->
        <div class="widget">
          <h3>Product Category</h3>
          <ul class="list-unstyled arrow">
		  <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Tour & Travel<b class="caret"></b></a>
            <ul class="dropdown-menu">
             <?php 
		foreach($this->TourType as $keys=>$valuess){ 		
		?>
		<li><a href="<?php echo URL."lists/?tour=".$valuess["Name"];?>"><?php echo $valuess["Name"];?></a></li>
		<?php }
		?>
            </ul>
          </li>
		  <li><a href="<?php echo URL."lists/?honeymoon";?>">Honeymoon </a></li>
		  <li><a href="<?php echo URL."lists/?yoga";?>">Yoga </a></li>
		  <li><a href="<?php echo URL."lists/?wedding";?>">Wedding </a></li>
          </ul>
        </div>
        <!-- Widget: Tags -->
        <div class="widget">
          <h3>Area</h3>
          <div class="tags">
		  <?php 
		foreach($this->Area as $keyx=>$valuex){ 		
		?>
		<a href="<?php echo URL."lists/?area=".$valuex["AreaName"];?>"><?php echo $valuex["AreaName"];?></a> 
		<?php }
		?>
		  
		  </div>
        </div>
        <!-- Widget: Archive
        <div class="widget">
          <h3>Archive</h3>
          <ul class="list-unstyled arrow">
            <li><a href="#">April 2014 <span class="badge pull-right">15</span></a></li>
            <li><a href="#">May 2014 <span class="badge pull-right">9</span></a></li>
            <li><a href="#">February 2014 <span class="badge pull-right">3</span></a></li>
            <li><a href="#">January 2014 <span class="badge pull-right">5</span></a></li>
          </ul>
        </div>
		 -->
      </div>
    </aside>
  </div>
</div>

<!-- Footer -->
