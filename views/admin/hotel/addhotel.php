<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/iCheck/all.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Hotel
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
        <form role="form" action="<?php echo URL."admin/savehotel";?>" method="POST">
		<div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Hotel Name</label>
                  <input name="Name" type="text" class="form-control" placeholder="Enter Hotel Name" required>
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label>Address</label>
                  <input name="addr" type="text" class="form-control" placeholder="Enter Address" required>
                </div>
				<div class="form-group">
                  <label>Country</label>
                  <select name="country" class="form-control">
                    <?php
					foreach($this->country as $key => $value) {
					?>	
                    <option value="<?php echo $value["CountryID"];?>"><?php echo $value["CountryName"];?></option>
					<?php }?>
                  </select>
                </div>
				<div class="form-group">
                  <label>State / Province</label>
                  <input name="Province" type="text" class="form-control" placeholder="Enter State/Province" required>
                </div>
				<div class="form-group">
                  <label>City</label>
                  <input name="city" type="text" class="form-control" placeholder="Enter City" required>
                </div>
				<div class="form-group">
                  <label>Phone</label>
                  <input name="Phone" type="text" class="form-control" placeholder="Enter Phone" required>
                </div>
				<div class="form-group">
                  <label>FAX</label>
                  <input name="fax" type="text" class="form-control" placeholder="Enter Fax">
                </div>
				<div class="form-group">
                  <label>Corporate Email :</label>
                  <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                </div>
				<div class="form-group">
                  <label>Map Latitude</label>
                  <input name="lat" type="text" class="form-control" placeholder="Googlemap Latitude" required>
                </div>
				<div class="form-group">
                  <label>Map Longitude</label>
                  <input name="long" type="text" class="form-control" placeholder="Googlemap Longitude" required>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              
			  <div class="form-group">
                  <label>Hotel Clasification</label>
                  <select name="proclas[]" class="form-control select2" multiple="multiple" data-placeholder="Select Hotel Clasification"
                        style="width: 100%;">
					<?php
					foreach($this->hotelclas as $key => $value) {
					?>	
                  <option><?php echo $value["CategoryName"];?></option>
					<?php }?>
                </select>
                </div>
				<div class="form-group">
                  <label>Star Clasification</label>
                  <select name="star" class="form-control">
				  <?php
					foreach($this->stars as $key => $value) {
					?>	
                    <option value="<?php echo $value["startipeID"];?>"><?php echo $value["startipeName"];?></option>
					<?php }?>
                  </select>
                </div>
				<div class="form-group">
                  <label>Check-In Time :</label>
                  <input name="cin" type="text" class="form-control" placeholder="Example 07:00" required>
                </div>
				<div class="form-group">
                  <label>Check-Out Time :</label>
                  <input name="cout" type="text" class="form-control" placeholder="Example 13:00" required>
                </div>
				<div class="form-group">
                <label>Location Tag(Area) :</label>
                <select name="tag[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                  <?php
					foreach($this->areas as $key => $value) {
					?>	
                  <option><?php echo $value["AreaName"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
                  <label>Commision (%) :</label>
                  <input name="commo" type="number" class="form-control" placeholder="in %" required>
                </div>
				<div class="form-group">
                  <label>Starting Price :</label>
                  <input name="minprice" type="number" class="form-control" placeholder="IDR" required>
                </div>
              </div>
              
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
			
          </div>
          <!-- /.row -->
		 
        </div>
		<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Description</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <div class="box-body pad">
				
					<label>					
						<textarea name="desk" class="textarea" placeholder="Some Hotel Descriptions."
                          style="width: 100%; height: 200px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
            </div>
            <!-- /.box-body -->
            
          </div>
		  <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Fasilities</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <!-- checkbox -->
              <div class="form-group">
                <?php
				foreach($this->hotelfas as $key=>$value){ ?>
				
				<div class="checkbox col-md-4">
					<label>					
						<input type="checkbox" name="Chk<?php echo $value['hotelfasID'];?>" class="flat-red"> &nbsp; &nbsp;<?php echo $value['hotelfasName']?>
					</label>
				</div>
              
				<?php
				}
				?>
              <!-- radio -->
             </div>
            </div>
            <!-- /.box-body -->
            
          </div>
		  <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Contact Person</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->
			<div class="col-md-6">
              
              <div class="form-group">
						<label>Name</label>
                  <input name="picname" type="text" class="form-control" placeholder="Enter a Name" required>
					</label>
              <!-- radio -->
             </div>
              <div class="form-group">
						<label>Disignation</label>
                  <input name="picdis" type="text" class="form-control" placeholder="Contact Disignation" required>
					</label>
              <!-- radio -->
             </div>
			 <div class="form-group">
						<label>Mobile Number</label>
                  <input name="picmobile" type="text" class="form-control" placeholder="Contact Mobile Number" required>
					</label>
              <!-- radio -->
             </div>
            </div>
            <!-- /.box-body -->
			</div>
          </div>
        <div class="box-footer">
		
		<button type="submit" class="btn btn-info pull-right">Save</button>
	  </div>
        </div>
        <!-- /.box-body -->
		
		
      
		</form>
        
      
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
<!-- Slimscroll -->
<script src="<?php echo URL;?>include/plugin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL;?>include/plugin/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
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
    $('.select2').select2({maximumSelectionLength: 3})

    

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
</script>
