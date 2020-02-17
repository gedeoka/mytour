<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/iCheck/all.css">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Tour
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
        <form role="form" action="<?php echo URL."admin/toursavetour";?>" method="POST">
		<div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Tour Name</label>
                  <input name="TourName" type="text" class="form-control" placeholder="Enter Tour Name" maxlength="35" required>
				  <input name="TourID" type="hidden" class="form-control" value="<?php echo Code::random_string();?>" required>
                </div>
				<div class="form-group">
                  <label>Tour Code</label>
                  <input name="TourCode" type="text" class="form-control" placeholder="Enter Tour Name" maxlength="200" required>
				  
                </div>
              <!-- /.form-group -->
              
				
				
				<div class="form-group">
                <label> Country :</label>
                <select name="country" id="country" class="form-control " data-placeholder="Select a State"
                        style="width: 100%;"  onchange="ChangeArea();">
                  <?php
					foreach($this->country as $key => $values) {
					?>	
                  <option value="<?php echo $values["CountryID"];?>"><?php echo $values["CountryName"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
                <label>Location Tag(Area) :</label>
                <select name="tag[]" id="area" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;" required>
                  <?php /*
					foreach($this->areas as $key => $value) {
					?>	
                  <option><?php echo $value["AreaName"];?></option>
					<?php }*/?>
                </select>
				</div>
				<div class="form-group">
                <label> Tour Type :</label>
                <select name="tourtype" class="form-control " data-placeholder="Select a Tour Type"
                        style="width: 100%;">
                  <?php
					foreach($this->tourtype as $key => $values) {
					?>	
                  <option value="<?php echo $values["ID"];?>"><?php echo $values["Name"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
                <label> Price Type :</label>
				 
                   <select name="pricetype" class="form-control ">
                  <option value="1">Per Pax</option>
					<option value="2">Couple</option>
                </select>
				</div>
				<div class="form-group">
                <label> Tour Category :</label>
                <select name="tourcat" class="form-control " data-placeholder="Select a Tour Type"
                        style="width: 100%;">
                  <?php
					foreach($this->tourcat as $key => $values) {
					?>	
                  <option value="<?php echo $values["ID"];?>"><?php echo $values["Name"];?></option>
					<?php }?>
                </select>
				</div>
<div class="form-group">
              <!-- Minimal style -->

					<label>	Tour Description				
						<textarea name="desk" class="textarea" placeholder="Some Property Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
              </div>	
<div class="form-group">
              <!-- Minimal style -->
					<label>	Tour Itenery				
						<textarea name="iten" class="textarea" placeholder="Some Property Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
			 
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- Minimal style -->
				<div class="form-group">
                  <label>Price:</label><br>
				  Adult(USD):
                 <br>
				 <input name="Cur" id="Cur" type="hidden" class="form-control" value="USD"> 
				 <input name="Price1" id="Price1" type="number" class="form-control" value="0" placeholder="Enter Price">
				 Child(USD):
                 <br>
                  <input name="Price2" id="Price2" type="number" class="form-control" value="0" placeholder="Enter Price">
				  <br>
				 
                </div>
				
              <div class="form-group">
				
					<label>	Inclusion : 	
						<textarea name="Inclusion" class="textarea" placeholder="Some Property Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
              
			  
            <div class="form-group">
					<label>				Exlusion:
						<textarea name="Exclusion" class="textarea" placeholder="Some Property Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
				<div class="form-group">
				
					<label>				Term & Conditions:
						<textarea name="Term" class="textarea" placeholder="Some Property Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
			
          </div>
          <!-- /.row -->
		 
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
<script src="<?php echo URL;?>include/plugin/moment/min/moment.min.js"></script>
<script src="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
<script src="<?php echo URL;?>include/plugin/select2/dist/js/select2.full.min.js"></script>
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
    $('.select2').select2();

    
  })
	function ChangeArea(){
		//alert("Process");
		var gid =$('#country').val();
		//alert(dayx);
		 $.post("<?php echo URL.'admin/';?>charea",{gid:gid},function(x){
		   //alert(x);
		   $('#area').append(x);
		});
		return false;
	}
</script>
