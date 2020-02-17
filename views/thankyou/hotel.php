<div class="container  clearfix">
<div class="form-controlt mt20 clearfix">
          <h2>Thank you, your booking complete!</h2>
		  <p>Your confirmation number is <b><?php echo $this->NoBook;?></b></p>
        </div>
  <div class="row mt50 clearfix"> 
    <!-- Reservation form -->
    <section id="reservation-form" class=" clearfix">
      <div class="col-sm-12 col-md-7  mt20 clearfix">
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Booking Information</span></h2>
          <div class="col-sm-12">
		  <ul class="list-summarys">
		  <li><span>Contact's name</span> <?php echo $_GET["name"];?> </li>
		  <li><span>Contact's email address</span> <?php echo $_GET["email"];?> </li>
		  <li><span>Reachable mobile number </span> <?php echo $_GET["mobile"];?> </li>
		  <li><span>Guest's full name</span> <?php echo $_GET["Guest"];?> </li>
		  <li><span>Special request (optional)</span></li>
		  <p><?php echo $_GET["option"];?> </p>
		  <hr>
				<li class="big"><span><b> Grand Total  </span><?php echo  number_format($_GET["total"]);?></b></li>
				
		  </ul>
		  <hr>
		  <a href="<?php echo URL;?>" class="btn btn-primary btn-block"> Complete </a>
		  </div>
         
          </div>
		  
        </div>
		<div class="col-sm-12 col-md-5 mt20 clearfix">
    <?php if($this->sts=="Tour"){?>
      
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Booking Summary</span></h2>
		  <div class="col-sm-12" style="padding:0;margin:0px;">
		  <div class="col-sm-4">
		  <img src="<?php echo URL.Code::getField("roomgallery","thumb","RoomID='".$this->RoomID."' limit 0,1");?>" style="width:100%;height:auto;">
		  </div>
          <div class="price col-sm-8">
            <h4><?php echo  $this->single[0]["Name"];?><br><?php echo  $this->single[0]["RoomName"];?></h4><br>
			
			<div class="price col-sm-12">
			
          <ul class="list-summary">
		  
		  <input type="hidden" name="checkin" value="<?php echo $_GET["checkin"];?>">
		  <li><span>Adult  </span><?php echo $_GET["adult"];?> PAX<br>@ <?php echo  number_format($this->single[0]["Price"]);?> &nbsp; = &nbsp; <?php echo number_format($_GET["adult"]*$this->single[0]["Price"]);?></li>
			<li><span>Children</span><?php echo $_GET["child"];?> PAX<br>@ <?php echo  number_format($this->single[0]["Price"]);?> &nbsp; = &nbsp; <?php echo number_format($_GET["child"]*$this->single[0]["Price"]);?></li>
			
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo number_format(($_GET["adult"]*$this->single[0]["Price"])+($_GET["child"]*$this->single[0]["Price"]));?></b></li>
			</ul>
			</div>
          </div>
        </div>
	 
	<?php }?>
	<?php if($this->sts=="Yoga"){?>
      
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Booking Summary</span></h2>
		  <div class="col-sm-12" style="padding:0;margin:0px;">
		  <div class="col-sm-4">
		  <img src="<?php echo  URL.$this->single[0]["defaultImg"];?>" style="width:100%;height:auto;">
		  </div>
          <div class="price col-sm-8">
            <h4><?php echo  $this->single[0]["YogaName"];?></h4><br>
           
			</div>
			
			<div class="price col-sm-12">
			
          <ul class="list-summary">
				<input type="hidden" name="checkin" value="<?php echo $_GET["checkin"];?>">
		  <input type="hidden" name="checkout" value="<?php echo $_GET["checkout"];?>">
		  <input type="hidden" name="adult" value="<?php echo $_GET["adult"];?>">
		  
		  <input type="hidden" name="yoga" value="<?php echo $_GET["yoga"];?>">
				<li><span>Check in</span> <?php echo $_GET["checkin"];?> </li>
				<li><span>Check out</span><?php echo $_GET["checkout"];?></li>
<li><span>No.Pax   </span><?php echo $_GET["adult"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_GET["adult"]*$this->single[0]["Price1"]);?></li>
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $_GET["total"];?></b></li>
			</ul>
			</div>
          </div>
        </div>
	  
	<?php }?>
	<?php if($this->sts=="Wed"){?>
     
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Booking Summary</span></h2>
		  <div class="col-sm-12" style="padding:0;margin:0px;">
		  <div class="col-sm-4">
		  <img src="<?php echo  URL.$this->single[0]["defaultImg"];?>" style="width:100%;height:auto;">
		  </div>
          <div class="price col-sm-8">
            <h4><?php echo  $this->single[0]["WeddingName"];?></h4><br>
           
			</div>
			
			<div class="price col-sm-12">
			
          <ul class="list-summary">
				<input type="hidden" name="checkin" value="<?php echo $_GET["checkin"];?>">
		  <input type="hidden" name="checkout" value="<?php echo $_GET["checkout"];?>">
		  <input type="hidden" name="wedding" value="<?php echo $_GET["wedding"];?>">
				<li><span>Check in</span> <?php echo $_GET["checkin"];?> </li>
				<li><span>Check out</span><?php echo $_GET["checkout"];?></li>
			
			<li><span>Price  </span><?php echo $this->single[0]["Cur"]." ".($this->single[0]["Price1"]);?></li>
			
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $_GET["total"];?></b></li>
				
			</ul>
			</div>
          </div>
        </div>
	 
	<?php }?>
	
	
	</div>
    </section>
  </div>
  
</div>
</form>
<script>
 
$('#ch1').click(function(){
    document.getElementById('Guest').value= document.getElementById('name').value;
});
</script>