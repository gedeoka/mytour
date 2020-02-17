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
        Country Dashboard
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- general form elements -->
          <div class="box  col-xs-6">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Country</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo URL."admin/addcountry";?>" method="POST" enctype="multipart/form-data" >
              <div class="box-body  col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Country Name :</label>
                  <input name="country" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Country Name">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Deskription :</label>
                  <textarea name="desk"  class="form-control" id="exampleInputEmail1"></textarea>
                </div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="file" name="files" id="uploadfile" class="form-control" />
					</div>
				</div>
				
					<div class="clearfix"></div>
                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>              
              </div>
              <!-- /.box-body -->

              
            </form>
        </div>  
		<div class="clearfix"></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Area List  </h3><br>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>CountryID</th>
                  <th>Country Name</th>
				  <th>Deskription</th>
				  <th>Image</th>
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
                        foreach ($this->listcountry as $key => $value) {
                            ?>
                <tr>
                  <td><?php echo $value['CountryID']; ?></td>
                  <td><?php echo $value['CountryName']; ?></td>
				  <td><?php echo $value['Desk']; ?></td>
				  <td><?php if ($value['Images']<>""){ ?><img width="50px" height="50px" src="<?php echo URL.$value['Images']; ?>"><?php }?>
				  </td>
                  <td><a href="<?php echo URL;?>admin/countryedit/<?php echo $value['CountryID']; ?>"> Edit </a></td>
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
</script>