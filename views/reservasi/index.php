<form  role="form" method="GET" action="<?php echo URL."thankyou/";?>" name="reservationforms" id="reservationforms">
<div class="container mt50 clearfix">
  <div class="row  clearfix"> 
    <!-- Reservation form -->
    <section id="reservation-form" class=" clearfix">
      <div class="col-sm-12 col-md-7  mt20 clearfix">
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Your Information</span></h2>
          
          <!-- Error message display -->
        <div class="form-group">
            <label for="Name" accesskey="N">Contact's name *</label>
            <input name="name" type="text" id="name" value="" class="form-control" placeholder="As in Passport/Official ID Card (without title/special characters)" required/>
			<span class="list-summary">As in Passport/Official ID Card (without title/special characters)</span>
          </div>
          
		<div class="form-group col-sm-6">
            <label for="email" accesskey="E">Contact's email address * </label>
            <input name="email" type="text" id="email" value="" class="form-control" placeholder="e.g.: email@example.com" required/>
			<span class="list-summary">e.g.: email@example.com</span>
          </div>
         <div class="form-group col-sm-6">
            <label for="mobile">Reachable mobile number * </label>
            <input name="mobile" type="text" id="email" value="" class="form-control" placeholder="e.g. +62812345678" required/><span class="list-summary">e.g. +62812345678, for Country Code (+62) and Mobile No. 0812345678
</span>
          </div> 
<div class="form-group">            
            <input name="ch1" type="checkbox" id="ch1" value="" class="form-controls"/><p class="form-controlp"> I am the guest.			</p>		
          </div>
		<div class="form-group">
            <label for="Name" accesskey="N">Guest's full name *</label>
            <input name="Guest" type="text" id="Guest" value="" class="form-control" placeholder="As in Passport/Official ID Card (without title/special characters)" required/>
			<span class="list-summary">Fill in your name as on ID card/passport/driving license (without title/special characters)</span>
          </div>
		  
		  <div class="form-group">
            <textarea name="option" class="form-control"></textarea>
			<label for="Name" accesskey="N">Special request (optional)</label><br>
			<span class="list-summary">Have a special request? Ask, and the property will do its best to meet your wish. (Note that special request are not guaranteed and may incur charges)</span>
          </div>
		  <hr>
		  <div class="form-group">
		  
<span class="list-summary">By clicking this button, you acknowledge that you have read and agreed to Our <a href="<?php echo URL."page/?pages=Term-And-Conditions";?>" target="_blank">Term & Conditions</a> </span>
            <input name="submit" id="submit" type="submit" value="Confirm Booking" class="btn btn-primary btn-block" >
          </div>
          </div>
		  
        </div>
		<div class="col-sm-12 col-md-5 mt20 clearfix">
   
      
        <div class="reservation-vertical clearfix" id="reservationforms">
          <h2 class="lined-heading"><span>Booking Summary</span></h2>
		  <div class="col-sm-12" style="padding:0;margin:0px;">
		  <div class="col-sm-4">
		  <img src="<?php echo  URL.$this->single[0]["defaultImg"];?>" style="width:100%;height:auto;">
		  </div>
          <div class="price col-sm-8">
            <h4><?php echo  $this->single[0]["TourName"];?></h4><br>
           
			
			</div>
			
			<div class="price col-sm-12">
			
          <ul class="list-summary">
		  
		  <input type="hidden" name="checkin" value="<?php echo $_GET["checkin"];?>">
			  <?php /* ?>
		  <input type="hidden" name="checkout" value="<?php echo $_GET["checkout"];?>">
		  <?php */?>
		  
		  <input type="hidden" name="adult" value="<?php echo $_GET["adult"];?>">
		  <input type="hidden" name="child" value="<?php echo $_GET["child"];?>">
		 
		  <input type="hidden" name="prod" value="<?php echo $_GET["Tour"];?>">
		  
				<li><span>Travel Date</span> <?php echo $_GET["checkin"];?> </li>
			   <?php /* ?>
				<li><span>Check out</span><?php echo $_GET["checkout"];?></li>
				 <?php */?>
			
			<li><span>Adult  </span><?php echo $_GET["adult"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price1"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_GET["adult"]*$this->single[0]["Price1"]);?></li>
			<li><span>Children</span><?php echo $_GET["child"];?> PAX<br>@ <?php echo  $this->single[0]["Cur"]." ".$this->single[0]["Price2"];?> &nbsp; = &nbsp; <?php echo $this->single[0]["Cur"]." ".($_GET["child"]*$this->single[0]["Price2"]);?></li>
			
			
				<hr>
				
				
				<li class="big"><span><b> Grand Total  </span><?php echo $this->single[0]["Cur"]." ".(($_GET["adult"]*$this->single[0]["Price1"])+($_GET["child"]*$this->single[0]["Price2"]));?></b></li>
				<input type="hidden" name="total" value="<?php echo (($_GET["adult"]*$this->single[0]["Price1"])+($_GET["child"]*$this->single[0]["Price2"]));?>">
				
			</ul>
			</div>
          </div>
        </div>
	 
	
	
	<div class="reservation-vertical mt20">
          <h2 class="pheads">Payment</h2>
		  <p>for the moment we only accept payments via bank transfer.</p>
		  <p>Payment can be transfer to : </p>
		  <ul class="list-summary">				
				<li><span>Bank Name</span> Bank  </li>
				<li><span>Account No.</span>-</li>
				<li><span>Account Name.</span>PT. APA Tour </li>
			</ul>
        </div>
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