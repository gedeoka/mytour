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
		  <li><span>Contact's name</span> <?php echo $_POST["name"];?> </li>
		  <li><span>Contact's email address</span> <?php echo $_POST["email"];?> </li>
		  <li><span>Reachable mobile number </span> <?php echo $_POST["mobile"];?> </li>
		  <li><span>Guest's full name</span> <?php echo $_POST["Guest"];?> </li>
		  <li><span>Special request (optional)</span></li>
		  <p><?php echo $_POST["option"];?> </p>
		  <hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $this->single[0]["Cur"]." ". $_POST["total"];?></b></li>
				
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
		  <img src="<?php echo  URL.$this->single[0]["defaultImg"];?>" style="width:100%;height:auto;">
		  </div>
          <div class="price col-sm-8">
            <h4><?php echo  $this->single[0]["TourName"];?></h4><br>
            <?php echo  $this->single[0]["Day"];?><span>Day's and </span> <?php echo  $this->single[0]["Night"];?><span>Night's</span><br>
			
			</div>
			
			<div class="price col-sm-12">
			
          <ul class="list-summary">
		  
		  <input type="hidden" name="checkin" value="<?php echo $_POST["checkin"];?>">
		  <?php if($this->single[0]["sts"]==1){?>
		  <input type="hidden" name="adult" value="<?php echo $_POST["adult"];?>">
		  <input type="hidden" name="child" value="<?php echo $_POST["child"];?>">
		  <?php }?>
		  <input type="hidden" name="prod" value="<?php echo $_POST["prod"];?>">
		  
				<li><span>Check in</span> <?php echo $_POST["checkin"];?> </li>
			<?php if($this->single[0]["sts"]==1){?>
			<li><span>Adult  </span><?php echo $_POST["adult"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_POST["adult"]*$this->single[0]["Price1"]);?></li>
			<li><span>Children</span><?php echo $_POST["child"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price2"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_POST["child"]*$this->single[0]["Price2"]);?></li>
			
			<?php }elseif($this->single[0]["sts"]==2){?>
			<li><span>Price  </span><?php echo $this->single[0]["Cur"]." ".($this->single[0]["Price1"]);?></li>
			<?php }
			?>
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $this->single[0]["Cur"]." ". $_POST["total"];?></b></li>
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
				<input type="hidden" name="checkin" value="<?php echo $_POST["checkin"];?>">
		  <input type="hidden" name="checkout" value="<?php echo $_POST["checkout"];?>">
		  <input type="hidden" name="adult" value="<?php echo $_POST["adult"];?>">
		  
		  <input type="hidden" name="yoga" value="<?php echo $_POST["yoga"];?>">
				<li><span>Check in</span> <?php echo $_POST["checkin"];?> </li>
				<li><span>Check out</span><?php echo $_POST["checkout"];?></li>
<li><span>No.Pax   </span><?php echo $_POST["adult"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_POST["adult"]*$this->single[0]["Price1"]);?></li>
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $_POST["total"];?></b></li>
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
				<input type="hidden" name="checkin" value="<?php echo $_POST["checkin"];?>">
		  <input type="hidden" name="checkout" value="<?php echo $_POST["checkout"];?>">
		  <input type="hidden" name="wedding" value="<?php echo $_POST["wedding"];?>">
				<li><span>Check in</span> <?php echo $_POST["checkin"];?> </li>
				<li><span>Check out</span><?php echo $_POST["checkout"];?></li>
			
			<li><span>Price  </span><?php echo $this->single[0]["Cur"]." ".($this->single[0]["Price1"]);?></li>
			
				<hr>
				<li class="big"><span><b> Grand Total  </span><?php echo $_POST["total"];?></b></li>
				
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