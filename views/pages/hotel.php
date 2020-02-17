

<!-- Rooms -->
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      <?php foreach($this->HotelList as $key=>$value){?>
      <div class="col-sm-4">
        <div class="room-thumb"> 
		
		<img src="<?php 
		if ($value["defaultImg"]==""){
			echo URL."asset/images/Thumb-no-img.jpg"; 
		}else{
			echo URL.$value["defaultImg"];
		}
		?>" class="img-responsive" >
		
          <div class="mask">
            <div class="main">
              <h5><?php echo substr($value["HotelName"],0,30);?></h5>
			  <div class="price col-md-3"><small></small> <?php echo number_format($value["Price"]);?> </div>
              
            </div>
            <div class="content">
              
              Room : <b><?php echo $value["RoomName"];?></b><br>
			  <?php echo " Size : ".$value["RoomSize"].'sqm';?><br>
			  <?php echo substr($value["Deskripsi"],0,100);?><br>
              <a href="<?php echo URL."pages/hoteldtl/".$value["HotelName"].",$".$value["HotelID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
