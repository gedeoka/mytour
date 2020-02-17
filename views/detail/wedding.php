<!-- Parallax Effect -->

<div class="container">
  <div class="row"> 
    <!-- Slider -->
    <section class="room-slider standard-slider mt50">
      <div class="col-sm-12 col-md-8">
        <div id="owl-standard" class="owl-carousel">
		<?php foreach($this->imglist as $key=>$value){
			?>
			<div class="item"> <a href="<?php echo URL.$value["Image"];?>" data-rel="prettyPhoto[gallery1]"><img src="<?php echo URL.$value["Image"];?>" alt="<?php echo $value["Name"];?>" class="img-responsive"></a> </div>
			<?php
		}?>
        </div>
      </div>
    </section>
    
    <!-- Reservation form -->
    <section id="reservation-form" class="mt50 clearfix">
      <div class="col-sm-12 col-md-4">
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Package</span></h2>
          <div class="price">
            <h4><?php echo  $this->single[0]["WeddingName"];?></h4>
			
			<br>
			<hr>
			
			<?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?><span>/Package	 </span>
			
			</div>
          <div id="message"></div>
          <!-- Error message display -->
          <form class="mt10 " method="GET" action="<?php echo URL."reservasi";?>">
			
			<div class="col-md-12">
            <small>Travel Date</small>
            
            <i class="fa fa-calendar infield"></i>
            <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in" required/>
			</div>
			  <!----
			<div class="col-md-6">
			<small>Check-out</small>
            
            <i class="fa fa-calendar infield"></i>
            <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out" required/>
			</div>
-->
			<br>
			
			
			
			<br>
			<input name="wedding" type="hidden" class="form-control" value="<?php echo $this->single[0]["WeddingName"]." | ".$this->single[0]["WeddingCode"]." | ".$this->single[0]["WeddingID"];?>" />
			<div class="col-md-12">
			<input type="submit" value="Book Now" class="btn btn-primary btn-block">
			</div>
          </form>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Room Content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 mt50">
            <h2 class="lined-heading"><span>Package Detail</span></h2>
			 
			 <!-- Nav tabs -->
            <ul class="nav nav-tabs">
			<li class="active"><a href="#overview" data-toggle="tab"> Detail</a></li>			
              <li><a href="#inclu" data-toggle="tab">Inclusion</a></li>              
			  <li><a href="#exclu" data-toggle="tab">Exclusion</a></li>
              <li><a href="#term" data-toggle="tab">Term & Condition</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="overview">
                <?php echo  str_replace("%27","'",$this->single[0]["Desk"]);?>
              </div>
              <div class="tab-pane fade" id="inclu">
                <?php echo  str_replace("%27","'",$this->single[0]["Inclusion"]);?>
              </div>
              <div class="tab-pane fade" id="exclu">
				<?php echo  str_replace("%27","'",$this->single[0]["Exclusion"]);?>
			  </div>
			  <div class="tab-pane fade" id="term">
                <?php echo  str_replace("%27","'",$this->single[0]["Term"]);?>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </section>
  </div>
</div>

<!-- Other Rooms -->
<section class="rooms mt30">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>See Other :</span></h2>
		<?php 

foreach($this->Other as $key=>$value){?>
      <div class="col-sm-4">
        <div class="room-thumb"> 
		
		<img src="<?php if ($value["defaultImg"]==""){ echo URL."asset/images/Thumb-no-img.jpg"; }else{ echo URL.$value["defaultImg"];}?>" class="img-responsive" />
          <div class="mask">
            <div class="main">
              <h5><?php echo substr($value["WeddingName"],0,25);?></h5>
			  <div class="price col-md-3"><?php echo $value["Cur"];?> <?php echo number_format($value["Price1"]);?> </div>
              
            </div>
            <div class="content">
              <?php echo substr($value["Desk"],0,100);?>
              
              <a href="<?php echo URL."detail/?wedding=".$value["WeddingName"].",$".$value["WeddingID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      </div>
    </div>
  </div>
</section>
<!-- Footer -->
