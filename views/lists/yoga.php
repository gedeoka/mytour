

<!-- Rooms -->
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      <?php foreach($this->listarea as $key=>$value){?>
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
              <h5><?php echo substr($value["YogaName"],0,30);?></h5>
			  <div class="price col-md-3"><small><?php echo $value["Cur"];?></small> <?php echo number_format($value["Price1"]);?> </div>
              
            </div>
            <div class="content">
              <?php echo substr($value["Desk"],0,100);?>
              
              <a href="<?php echo URL."detail/?yoga=".$value["YogaName"].",$".$value["YogaID"];?>" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
