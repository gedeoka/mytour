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
          
          <div class="price">
            <h4><?php echo  $this->single[0]["TourName"];?></h4><br>
            <?php echo  $this->single[0]["Day"];?><span>Day's and </span> <?php echo  $this->single[0]["Night"];?><span>Night's</span>
			<br>
			<span><b>Area </b>: <?php 
			$areal=str_replace(","," - ",$this->single[0]["Area"]);
			echo substr($areal,0,-2);?> </span> 
			<br>
			<hr>
			<?php if($this->single[0]["sts"]==1){?>
			<span>Adult :  </span>
            <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?><span>/Person </span>
			<br><span>Child :  </span>
            <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price2"];?><span>/Person </span>
			<?php }elseif($this->single[0]["sts"]==2){?>
			<?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?><span>/Couple </span>
			<?php }elseif($this->single[0]["sts"]==3){?>
			<?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?><span>/Pax </span>
			<?php }?>
			
			
		  </div>
          <div id="message"></div>
          <!-- Error message display -->
          <form class="mt10 " method="GET" action="<?php echo URL."reservasi";?>">
			
			<div class="col-md-12">
            <small>Travel Date</small>
            
            <i class="fa fa-calendar infield"></i>
            <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in" required/>
			</div>
			  
			
				<?php /*?>
				<div class="col-md-6">
			<small>Travel Date</small>
            
            <i class="fa fa-calendar infield"></i>
            <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out" required/>
			</div>
			<br>
			<?php */?>
			<?php if($this->single[0]["sts"]==1){?>
			<div class="col-md-6">
			
			<small>Adult</small>
            <select name="adult" id="adult"  class="form-control" >
			<?php for($i=2;$i<15;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select>
			</div>
			<div class="col-md-6">
			<small>Child</small>
            <select  name="child" id="child"  class="form-control" >
			<?php for($i=0;$i<15;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select>
			
			</div>
			<?php }elseif($this->single[0]["sts"]==2){?>
			
			<?php }elseif($this->single[0]["sts"]==3){?>
			<div class="col-md-6">
			<small>No.Pax</small>
            <select name="adult" id="adult"  class="form-control" >
			<?php for($i=1;$i<15;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select>
			</div>
			<?php }?>
			
			<br>
			<input name="prod" type="hidden" class="form-control" value="<?php echo $this->single[0]["TourName"]." | ".$this->single[0]["TourCode"]." | ".$this->single[0]["TourID"];?>" />
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
          <div class="col-sm-8 mt50">
            <h2 class="lined-heading"><span>Tour Detail</span></h2>
			 
                <?php echo  str_replace("%27","'",$this->single[0]["Desk"]);?>
            
			<?php foreach($this->Tour as $keyx=>$valuex){?>
			<h3 class="mt20">Day <?php echo $valuex["DayNo"];?></h3>
			<?php echo str_replace("\%27","'",$valuex["Deskripsi"]);?>	
			<?php }?>
            
          </div>
          <div class="col-sm-4 mt50">
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#overview" data-toggle="tab">Inclusion</a></li>
              
			  <li><a href="#exclu" data-toggle="tab">Exclusion</a></li>
              
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="overview">
                <?php echo  str_replace("%27","'",$this->single[0]["Inclusion"]);?>
              </div>
              
              <div class="tab-pane fade" id="exclu">
				<?php echo  str_replace("%27","'",$this->single[0]["Exclusion"]);?>
			  </div>
				
            </div>
			   <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#term" data-toggle="tab">Term & Conditions</a></li>
              
              
            </ul>
            <!-- Tab panes -->
			  <div class="tab-content">
              <div class="tab-pane fade in active" id="term">
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
              <h5><?php echo substr($value["TourName"],0,25);?></h5>
			  <div class="price col-md-3"><?php echo $value["Cur"];?> <?php echo number_format($value["Price1"]);?> </div>
              
            </div>
            <div class="content">
              <?php echo substr($value["Desk"],0,100);?>
              <?php if(($this->trs)=='tr'){?>
              <a href="<?php echo URL."detail/?details=".$value["TourName"].",$".$value["TourID"];?>" class="btn btn-primary btn-block">Read More</a><?php }elseif(($this->trs)=='hm'){?>
              <a href="<?php echo URL."detail/?honeymoon=".$value["TourName"].",$".$value["TourID"];?>" class="btn btn-primary btn-block">Read More</a><?php }?>
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
