

<!-- Rooms -->
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      <?php foreach($this->listcountry as $key=>$value){?>
      <div class="col-sm-4">
        <div class="room-thumb"> 
		
		<img src="<?php echo URL.$value["defaultImg"];?>" class="img-responsive" />
          <div class="mask">
            <div class="main">
              <h5><?php echo substr($value["TourName"],0,25);?></h5>
			  <div class="price col-md-3"><?php echo $value["Cur"];?> <?php echo number_format($value["Price1"]);?> </div>
              
            </div>
            <div class="content">
              <?php echo substr($value["Desk"],0,100);?>
              
              <a href="<?php echo URL."detail/?details=".$value["TourName"].",$".$value["TourID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
