<?php if (Code::GetField('settings','Value','ID=1')=="show"){?>
<!-- Revolution Slider -->
<section class="revolution-slider">
  <div class="bannercontainer">
    <div class="banner">
      <ul>
        <!-- Slide 1 -->
		
		<?php
		
		
		foreach($this->slides as $key => $value){
		  
		  ?>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" > 
          <!-- Main Image --> 
          <img src="<?php echo URL.$value["image"];?>" style="opacity:0;"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
          <div class="caption sft revolution-starhotel bigtext"  
          				data-x="505" 
                        data-y="30" 
                        data-speed="1000" 
                        data-start="1700" 
                        data-easing="easeOutBack"> <?php echo $value["title"];?></div>
          <!-- Layer 2 -->
          <div class="caption sft revolution-starhotel smalltext"  
          				data-x="505" 
                        data-y="105" 
                        data-speed="1000" 
                        data-start="1700" 
                        data-easing="easeOutBack"><?php echo $value["desk"];?></div>
        <!-- Layer 3 -->
			<?php if($value["uri"]<>'#'){;?>
                  <div class="caption sft"  
          				data-x="505" 
                        data-y="175" 
                        data-speed="1000" 
                        data-start="1900" 
                        data-easing="easeOutBack">
						<a href="<?php echo $value["uri"];?>" class="button btn btn-purple btn-lg">See detail</a> 
                  </div>
			<?php }?>
        </li>
		<?php }?>
		
      </ul>
    </div>
  </div>
</section>
<?php }?>
<?php if (Code::GetField('settings','Value','ID=2')=="show"){?>
<!-- Top Destination -->
<section class="rooms mt50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>Popular Destination</span></h2>
      </div>
      <!-- Room -->
	  <?php foreach($this->areas as $key=>$value){?>
      <div class="col-sm-4">
	  <div class="country">
		<img src="<?php if ($value["Images"]==""){ echo URL."asset/images/Thumb-no-img.jpg"; }else{ echo URL.$value["Images"]; }?>" />
              <div class="desk"><a href="<?php echo URL."lists/?area=".$value["slugs"];?>"><h4><?php echo $value["AreaName"].", ".$value["CountryName"];?></h4></a></div>
      </div>
	  </div>
      <?php }?>
	  
    </div>
  </div>
</section>
<?php }?>
<?php if (Code::GetField('settings','Value','ID=3')=="show"){?>
<!-- Special -->
<section class="rooms mt50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>Hot Promo</span></h2>
      </div>
      <!-- Room -->
	  <?php foreach($this->promo as $key=>$value){?>
      <div class="col-sm-4 mt20">
        <div class="room-thumb"> 
		
		<img src="<?php echo URL.$value["defaultImg"];?>" class="img-responsive" />
          <div class="mask">
            <div class="main">
              <h5><?php echo substr($value["TourName"],0,30);?></h5>
			  <div class="price col-md-3"> <?php echo $value["Cur"];?> <?php echo number_format($value["Price1"]);?> </div>
              
            </div>
            <div class="content">
              <?php echo substr($value["Desk"],0,100);?>...
              
              <a href="<?php echo URL."pages/detail/".$value["TourName"].",$".$value["TourID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
	  
    </div>
  </div>
</section>
<?php }?>
<?php if (Code::GetField('settings','Value','ID=4')=="show"){?>
<!-- Popular -->
<section class="rooms mt50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>Recommended Packages</span></h2>
      </div>
      <!-- Room -->
	  
	  <?php foreach($this->popular as $keys=>$values){?>
      <div class="col-sm-4">
        <div class="room-thumb"> 
		<img src="<?php echo URL.$values["defaultImg"];?>" class="img-responsive"  />
           <div class="mask">
            <div class="main">
              <h5><?php echo $values["TourName"];?></h5>
			  <div class="price"><?php echo $values["Cur"];?> <?php echo number_format($values["Price1"]);?> </div>
            </div>
            <div class="content">
              <?php echo substr($values["Desk"],0,100);?>
              
              <a href="<?php echo URL."pages/detail/".$values["TourName"].",$".$values["TourID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
	  <?php }?>
      
      
	  
    </div>
  </div>
</section>
<?php }?>

<!-- Footer -->
