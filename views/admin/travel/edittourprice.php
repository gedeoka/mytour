<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo URL;?>include/plugin/iCheck/all.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Price for : <?php echo $this->TourName;?>
        <br><small><a href="<?php echo URL."admin/toursetprice/".$this->TourID;?>" class="btn btn-success btn-xs">Back</a></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- general form elements -->
          <div class="box  col-xs-6">
            <div class="box-header with-border">
              <h3 class="box-title">Update Tour Price</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo URL."admin/touruptourprice/".$this->SinggleTourPrice[0]['TourID']."_".$this->SinggleTourPrice[0]['ID'];?>" method="POST">
              <div class="box-body  col-xs-6">
                <div class="form-group">
                  <label >Start From :</label>
                  <input name="Starts" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['Starts']; ?>">
				  <input name="ID" type="hidden" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['TourID']."_".$this->SinggleTourPrice[0]['ID']; ?>">
                </div>
				<div class="form-group">
                  <label>To :</label>
                  <input name="Ends" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['Ends']; ?>">
                </div>
				<div class="form-group">
                  <label>Domestic (Adult) :</label>
				  <select name="Cur1" class="form-control" style="width:30%;float:left;">
				   <option <?php if ($this->SinggleTourPrice[0]['Cur']=="IDR"){ echo "Selected";}?> value="IDR">IDR</option>
				   <option <?php if ($this->SinggleTourPrice[0]['Cur']=="USD"){ echo "Selected";}?> value="USD">USD</option>
                  </select>
                  <input name="Price" id="Price" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['Price']; ?>">
                </div>
				<div class="form-group">
                  <label>Expat (Adult) :</label>
				  <select name="Cur2" class="form-control" style="width:30%;float:left;">
				   <option <?php if ($this->SinggleTourPrice[0]['Cur2']=="IDR"){ echo "Selected";}?> value="IDR">IDR</option>
				   <option <?php if ($this->SinggleTourPrice[0]['Cur2']=="USD"){ echo "Selected";}?> value="USD">USD</option>
                  </select>
                  <input name="Price2" id="Price2" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['Price2']; ?>">
                </div>
				<div class="form-group">
                  <label>Discount for Child (in %) :</label>
                  <input name="Commision" id="Commision" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['Commision']; ?>" placeholder="Enter Commision"  onfocusout="Calc();return false">
                </div>
				<div class="form-group">
                  <label>Domestic (Child) :</label>
                  <input name="SellPrice"  id="SellPrice" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['SellPrice']; ?>" placeholder="Enter Commision">
                </div>
				<div class="form-group">
                  <label>Expat(Child):</label>
                  <input name="SellPrice2"  id="SellPrice2" type="text" class="form-control" value="<?php echo $this->SinggleTourPrice[0]['SellPrice2']; ?>" placeholder="Enter Commision">
                </div>
                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>              
              </div>
              <!-- /.box-body -->

              <div class="col-md-6">
				<div class="form-group">
                  <label>Cancelation  : </label>
				  </div>
				<div class="form-group">                
                  		<div class="form-group">
						<input type="checkbox" name="Cancelation" class="flat-red" <?php 
						if ($this->SinggleTourPrice[0]["Cancelation"]==1){
							echo "checked";
						}
						?>> &nbsp; &nbsp;Cancelation
				</div>	
                </div>
				<div class="form-group">
						<label>
						<div id="cancel">
						<?php
						$i=1;
                        foreach ($this->CancelList as $key => $value) {
							$i++;
                            ?>
							<input type="radio" name="CancelTerm" class="minimal" value="<?php echo $value["CancelID"];?>" <?php
							if ($value["CancelID"]==$this->SinggleTourPrice[0]["CancelationTerm"]){
								echo "checked";
							}
							?>> <?php echo $value["CancelName"];?><br>
						<?php 
						}?>
						</div>
                </label>
             </div>
            </form>
        </div>  
		<div class="clearfix"></div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0.0
    </div>
    <strong>Copyright &copy; 2018 APATOUR.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo URL;?>include/plugin/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo URL;?>include/plugin/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo URL;?>include/plugin/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL;?>include/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL;?>include/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL;?>include/js/demo.js"></script>
</body>
</html>
<script src="<?php echo URL;?>include/plugin/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL;?>include/plugin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  })
  function Calc(){
	  ///alert("this");
	price = $('#Price').val();
	price2 = $('#Price2').val();
	//alert(price);
	Commision = $('#Commision').val();
	///alert(Commision);
	var total = Number(price) - ((Number(Commision)/100)*Number(price));
	var total2 = Number(price2) - ((Number(Commision)/100)*Number(price2));
	//alert(total);
	$("#SellPrice").val(total);
	$("#SellPrice2").val(total2);
  }
</script>