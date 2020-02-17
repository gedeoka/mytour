<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Room List Of : <?php echo $this->hotelName;?>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Room List of : <b><?php echo $this->hotelName;?></b></h3><br>
			  <small><a class="btn btn-success btn-xs" href="<?php echo URL;?>admin/roomadd/<?php echo $this->HotelID;?>">Add New</a>  <a  class="btn btn-success btn-xs" href="<?php echo URL;?>admin/hotels">Back</a> </small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Hotel Name</th>
                  <th>RoomName</th>
				  <th>Capasity</th>
				  <th>Room Profile</th>
				  <th>Room Gallery</th>                  
				  <th>Availability <br>And Price</th>
				  <th>Status</th>
                </tr>
				<tbody>
				<?php
                        foreach ($this->listroom as $key => $value) {
                            ?>
                <tr>
					<td><?php echo $value['Name']; ?></td>
                  <td><?php echo $value['RoomName']; ?></td>
				  <td><?php echo $value['AdlPax']; ?> Adult, <?php echo $value['ChdPax']; ?> Child </td>
                  <td><a href="<?php echo URL."admin/editroom/".$value['RoomID']; ?>"> View Room</a></td>
                  <td><a href="<?php echo URL."admin/roomgallery/".$value['RoomID']; ?>"> Room Gallery</a></td>
				  <td><a href="<?php echo URL."admin/roomrate/".$value['RoomID']; ?>"> Set Availability & Price</a></td>
				  <td><div class="lst<?php echo $value['RoomID']; ?>"><?php echo $value['Status']; 
				  if ($value['Status']=="Void"){?>
				  <a class="act" href="#" rel="<?php echo $value['RoomID']; ?>" > - Activate </a>
				  <?php }else{ ?>
				  <a class="del" href="#" rel="<?php echo $value['RoomID']; ?>"> - Void </a>
				  <?php }?>
				  <div>
				  </td>
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
	if (confirm('Are you sure you want to Void This Room ?')) {
		$.post("<?php echo URL.'Hotellist';?>/voidroom",{gid:gid},function(x){
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
	if (confirm('Are you sure you want to Void This Room ?')) {
		$.post("<?php echo URL.'Hotellist';?>/actroom",{gid:gid},function(x){
			$(this).remove();
			$('.lst'+gid).html('Active <a class="act" href="#" rel="'+gid+'" > - Void </a>')
		});
	} else {
	}
    //return false;
    
});
</script>