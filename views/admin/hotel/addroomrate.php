<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
 <link rel="stylesheet" href="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" href="<?php echo URL;?>include/plugin/iCheck/all.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New RoomPrice
        <?php
/*		$get=$_GET["proclas"];
		$x=count($_GET["proclas"]);
		$home = $_GET['proclas'];
 
foreach($home as $value) {
	
    echo $value.'<br />';
}
*/
		?>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<div class="box-body">
         <div class="row">
        <form role="form" action="<?php echo URL."admin/saveroomrate";?>" method="GET">
		<div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
			<div class="form-group">
                  <label>Room Name : <?php echo $this->roomName;?> </label>
                  <p><b>[ Hotel : <?php echo $this->HotelName;?> ]  </b></p>
                </div>
              <div class="form-group">
                  <label>Publish Rate : </label>
				  <input name="adl" type="number" class="form-control" placeholder="Enter Room Price"  required>
                  <input name="roomID" type="hidden" class="form-control" value="<?php echo $this->roomID;?>" required>
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label>Sell Price : </label>
                  <input name="SellRate" type="number" class="form-control" placeholder="Enter Room Price" required>
                </div>
				<div class="form-group">
                  <label>Periode Of Time :</label>
				  </div>
				<div class="form-group">
                <label>From :</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="txtstart" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>To:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="txtend" class="form-control pull-right" id="datepicker2">
                </div>
                <!-- /.input group -->
              </div> 
				
              
              
              
              <!-- /.form-group -->
            </div>
			<div class="col-md-6">
               <div class="form-group">
                <label>To:</label>
				
					<label>					
						<textarea name="desk" class="textarea" placeholder="Some Hotel Descriptions."
                          style="width: 100%; height: 200px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
			  
              </div>
          
          <!-- /.row -->
		 
        
          </div>
		 
            
            <!-- /.box-body -->
            
          
        <div class="box-footer">
		
		<button type="submit" class="btn btn-info pull-right">Save</button>
	  </div>
        
        <!-- /.box-body -->
		
		
      
		</form>
        
      </div>
      <!-- /.row -->
	  </div>
        </div>
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
<!-- date-range-picker -->
<script src="<?php echo URL;?>include/plugin/moment/min/moment.min.js"></script>
<script src="<?php echo URL;?>include/plugin/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL;?>include/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL;?>include/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL;?>include/js/demo.js"></script>
<script src="<?php echo URL;?>include/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>

<script>
  
   $(function () {
    //Initialize Select2 Elements
   $('#datepicker').datepicker({
      autoclose: true
    })
	$('#datepicker2').datepicker({
      autoclose: true
    })
    
  })
</script>
