<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List All Wedding</b></h3><br>
			  <small> <a class="btn btn-success btn-xs" href="<?php echo URL;?>admin/addwedding/">Add New</a>  </small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Wedding Code</th>
				  <th>Wedding Package Name</th>
                  <th>Deskription</th>
				  <th>Country</th>
				  <th>Validity</th>
				  <th>Price</th>
				  <th>Gallery</th>
				  <th></th>                
                  <th></th>
                </tr>
				<tbody>
				<?php
                        foreach ($this->listwedding as $key => $value) {
                            ?>
                <tr>
					<td><?php echo $value['WeddingCode']; ?></td>
					<td><?php echo $value['WeddingName']; ?></td>
                  <td><?php echo substr($value['Desk'],0,50); ?></td>
				  <td><?php echo $value['CountryName']; ?></td>
				  <td><?php echo date("d/m/Y",strtotime($value['StartDate'])); ?> to <?php echo date("d/m/Y",strtotime($value['EndDate'])); ?> </td>
				  <td><?php echo $value['Cur']." ".number_format($value['Price1']); ?>/Package</td>
				  <td><a  class="btn btn-success btn-xs" href="<?php echo URL."admin/weddingsetgallery/".$value['WeddingID']; ?>"> Set<br>Gallery</a></td>
                  <td><a class="btn btn-warning btn-xs" href="<?php echo URL."admin/editwedding/".$value['WeddingID']; ?>">Edit</a></td>
                  <td>
				  <div id="stat">
				  <?php if ($value['Status']==1){?>
				  <a class="btn btn-danger btn-xs del" rel="<?php echo $value['WeddingID']; ?>"> Void</a>
				  <?php }else{?>
				  <a class="btn btn-danger btn-xs act" rel="<?php echo $value['WeddingID']; ?>"> Activate</a>
				  <?php }?>
				  </div></td>
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
    //alert(gid);
	if (confirm('Are you sure you want to Void This Wedding ?')) {
		$.post("<?php echo URL.'admin/voidwedding';?>",{gid:gid},function(x){
			//$(this).remove();
			//alert(x);
			chg.html(' <a class="btn btn-danger btn-xs act" href="#" rel="'+gid+'" > Active </a>');
			
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
	if (confirm('Are you sure you want to Activate This Wedding ?')) {
		$.post("<?php echo URL.'admin/actwedding';?>",{gid:gid},function(x){
			$(this).remove();
			chg.html(' <a class="btn btn-danger btn-xs del" href="#" rel="'+gid+'" > Void </a>')
		});
	} else {
	}
    //return false;
    
}); 
</script>