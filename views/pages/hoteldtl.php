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
          <h2 class="lined-heading"><span><?php echo  $this->single[0]["Name"];?></span></h2>
           <div class="price1">
            <hr>
            
			<?php echo  $this->single[0]["Address"];?><br>
			<?php echo  $this->single[0]["Province"];?>-<?php echo  $this->single[0]["City"];?><br><hr>
			Check-in Time : <?php echo  $this->single[0]["CheckIn"];?><br>
			Check-Out Time : <?php echo  $this->single[0]["CheckOut"];?><br><br>
		  </div>
          <div id="message"></div>
          <!-- Error message display -->
          
          </div>
        </div>
      </div>
    </section>
    
    <!-- Room Content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 mt50">
            <h2 class="lined-heading"><span>Hotel Deskription</span></h2>
			 
			<?php echo  str_replace("%27","'",$this->single[0]["Deskripsi"]);?>
            <!-- Tab panes -->
            
            
          </div>
           <div class="col-sm-12 mt50">
            <h2 class="lined-heading"><span>Rooms</span></h2>
			 
			<div  class="RoomList">
		<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               
				<tbody>
				<?php
                        foreach ($this->HotelRoom as $key => $value) {
                            ?>
                <tr>
					<td style="width :200px;"><img src="<?php echo URL.Code::getField("roomgallery","thumb","RoomID='".$value['RoomID']."' limit 0,1");?>">
					</td>
                  <td><b><?php echo $value['RoomName']; ?></b><br>
				  Capacity : <?php echo $value['AdlPax']; ?> Adult, <?php echo $value['ChdPax']; ?> Child <br>
				  <div style="font-size:12px;"><?php echo $value['Deskripsi']; ?></div>
				  </td>
				  <td style="text-align:right;"class="col-md-2"><span style="text-decoration:line-through;font-size:10px;">IDR <?php echo number_format($value['Publish']); ?></span><br>
				  <h3>IDR <?php echo number_format($value['Price']); ?></h3>
				  </td>
                  <td style="width :150px;">
				  Date :
            <input name="checkin" type="text" id="checkin<?php echo $value['RoomID'];?>" value="" class="form-control checkin" placeholder="Check-in" required/>
			
			
			<small>Adult</small>
            <select name="adult" id="adult<?php echo $value['RoomID'];?>"  class="form-control" >
			<?php for($i=1;$i<10;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select>
			
			
			<small>Child</small>
            <select  name="child" id="child<?php echo $value['RoomID'];?>"  class="form-control" >
			<?php for($i=0;$i<5;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
			</select>
			
			<br>
				  <p  onclick="myFunction('<?php echo $value['RoomID'];?>','<?php echo $this->single[0]['HotelID']; ?>')" class="btn btn-primary btn-block">Book Now</p>
				  </td>
                </tr>
                <?php } ?>
				</tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
            <!-- Tab panes -->
            
            
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<!-- Footer -->
<script>


   $(function () {
    //Initialize Select2 Elements
   $('.checkin').datepicker({
      autoclose: true
    })
	
    
  })
  
  
  function myFunction(arg,args) {
    //alert(arg);
	//
	var dates=$("#checkin"+arg).val();
	var adl=$("#adult"+arg).val();
	var chd=$("#child"+arg).val();
	if (dates==""){
		alert("Select Date");
	}else{
		var url = "../../reservasi?Hotel="+arg+"|"+args+"&checkin="+dates+"&adult="+adl+"&child="+chd;
		$(location).attr("href", url);
	}
	
}
</script>