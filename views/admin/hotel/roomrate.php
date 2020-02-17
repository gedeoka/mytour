<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo URL;?>include/plugin/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Room Rate For : <?php echo $this->roomName;?> [ Hotel : <?php echo $this->HotelName;?> ]
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- general form elements -->
          <div class="box  col-xs-6">
            <div class="box-header with-border">
              <h3 class="box-title"><small>
			  <a href="<?php echo URL."admin/addroomrate/".$this->roomID;?>"><i class="btn btn-success btn-xs">Set Rate & Availability</i></a> 
			  <a href="<?php echo URL."admin/roomlist/".$this->HotelID;?>"><i class="btn btn-primary btn-xs">Back</i></a> 
			  <?php /*?>
			  <a href="<?php echo URL."roomlist/updateroomrates/".$this->roomID;?>"><i class="btn btn-info btn-xs">Bulk Update</i></a>
*/?>			  </small></h3>
            </div>
           
        </div>  
		<div class="clearfix"></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available of <?php echo $this->roomName;?> [ Hotel : <?php echo $this->HotelName;?> ]</h3><br>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Publish Rate</th>
				  <th>Sell Rate</th>
				  <th>Deskription</th>
				  
				  
                </tr>
                </thead>
                <tbody>
				<?php
                        foreach ($this->RoomRate as $key => $value) {
                            ?>
                <tr>
                  <td><?php echo date("m/d/Y",strtotime($value['StartDate'])); ?> to <?php echo date("m/d/Y",strtotime($value['EndDate'])); ?></td>
                  <td><div class="form-group">
                  <?php 
				  echo number_format($value['PublishRate']);?>
                </div></td>
				  <td><?php echo number_format($value['Price']); ?></td>
                  
				  <td><?php echo $value['Deskription']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo URL;?>include/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>include/plugin/moment/min/moment.min.js"></script>
<script src="<?php echo URL;?>include/plugin/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
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
    $('#example1').DataTable() 
	$('#reservation').daterangepicker()
  });
  function save(arg){
	//delItem=$(this).parent();
	//alert("test");
    var gid = document.getElementById("qty_"+arg).value;
    var prid=arg;
	//alert(gid);
    $.post("<?php echo URL.'roomlist/chgroomav';?>",{gid:gid,prid:prid},function(x){
		
	});
	
    return false;
  }
</script>