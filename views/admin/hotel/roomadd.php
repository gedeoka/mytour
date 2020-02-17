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
        Add New Property
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
        <form role="form" action="<?php echo URL."admin/saveroom";?>" method="POST">
		<div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Room Name</label>
                  <input name="Name" type="text" class="form-control" placeholder="Enter Room Name" required>
				  <input name="HotelID" type="hidden" class="form-control" value="<?php echo $this->HotelID;?>">
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label>Room Size : in(M<sup>2</sup>)</label>
                  <input name="rsize" type="number" class="form-control" placeholder="Enter Room Size" required>
                </div>
				<?php /*?>
				<div class="form-group">
                  <label>Bed Type<br></label>
                  		<div class="form-group">
						 <?php 
				foreach($this->roomtype as $key=>$value){ ?>
						<input type="checkbox" name="tp[]" value="<?php echo $value["TypeID"];?>" class="flat-red"> &nbsp; &nbsp;<?php echo $value["TypeName"];?><br>
						
				<?php }?>
				</div>	
				</div>
				<?php */?>
                
				
            </div>
            <!-- /.col -->
            <div class="col-md-6">
				<div class="form-group">
                  <label>Capasity :</label>
				  
				<div class="form-group">
                  Adult :<br>
                  <input name="adl" type="number" class="form-control" value="1" required>
				  Child :<br>
				  <input name="chl" type="number" class="form-control" value="0" required>
                </div>
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
              
                <textarea name="desk"  class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
              
            </div>
            <!-- /.box-body -->
            
          </div>
		  <?php /*?>
		  <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Fasilities</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <!-- checkbox -->
              <div class="form-group">
                <?php
				foreach($this->roomfas as $key=>$value){ ?>
				
				<div class="checkbox col-md-4">
					<label>					
						<input type="checkbox" name="Chk<?php echo $value['roomfasID'];?>" class="flat-red"> &nbsp; &nbsp;<?php echo $value['roomfasName']?>
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
		  <?php */?>
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