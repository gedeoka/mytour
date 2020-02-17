<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hotel List : </h3><br>
			  <small><a href="<?php echo URL;?>admin/addhotel">Add New</a></small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Hotel Name</th>
                  <th>Address</th>
                  <th>Profile</th>
                  <th>Gallery</th>
				  <th>RoomList</th>
				  <th>Status</th>
                </tr>
				<tbody>
				<?php
                        foreach ($this->listpro as $key => $value) {
                            ?>
                <tr>
					<td><?php echo $value['Name']; ?></td>
                  <td><?php echo $value['Address']; ?></td>
                  <td><a href="<?php echo URL."admin/edithotel/".$value['HotelID']; ?>"> View Hotel</a></td>
                  <td><a href="<?php echo URL."admin/hotgallery/".$value['HotelID']; ?>"> Hotel Gallery</a></td>
				  <td><a href="<?php echo URL."admin/roomlist/".$value['HotelID']; ?>"> Rooms</a></td>
				  <td><div class="lst<?php echo $value['HotelID']; ?>"><?php echo $value['Status']; 
				  if ($value['Status']=="Void"){?>
				  <a class="act" href="#" rel="<?php echo $value['HotelID']; ?>" > - Activate </a>
				  <?php }else{ ?>
				  <a class="del" href="#" rel="<?php echo $value['HotelID']; ?>"> - Void </a>
				  <?php }?>
				  <div>
                </tr>
                <?php } ?>
				</tbody>
                </thead>
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
    <strong>Copyright &copy; 2018 Manage By Abraham Group.</strong> All rights
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
  })
 
$('.del').click(function(){
    chg=$(this).parent();
    var gid = $(this).attr('rel');
   //var gnm = $(this).attr('rels');
    //
	if (confirm('Are you sure you want to Void This Hotel ?')) {
		$.post("<?php echo URL.'admin';?>/voidhotel",{gid:gid},function(x){
			$(this).remove();
			$('.lst'+gid).html('Active <a class="act" href="#" rel="'+gid+'" > - Void </a>');
			$('.lst'+gid).html('Void <a class="del" href="#" rel="'+gid+'" > - Activate </a>');
		});
	} else {
	}
   // return false;
    
});
$('.act').click(function(){
    chg=$(this).parent();
    var gid = $(this).attr('rel');
   //var gnm = $(this).attr('rels');
    //
	if (confirm('Are you sure you want to Void This Hotel ?')) {
		$.post("<?php echo URL.'admin';?>/acthotel",{gid:gid},function(x){
			$(this).remove();
			$('.lst'+gid).html('Active <a class="act" href="#" rel="'+gid+'" > - Void </a>')
		});
	} else {
	}
    //return false;
    
}); 

</script>