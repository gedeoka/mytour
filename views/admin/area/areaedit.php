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
        Area Dashboard
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- general form elements -->
          <div class="box  col-xs-6">
            <div class="box-header with-border">
              <h3 class="box-title">Update Area</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo URL."admin/updarea/".$this->AreaSingle['AreaID'];?>" method="POST" enctype="multipart/form-data" >
              <div class="box-body  col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Area Name :</label>
                  <input name="areaname" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $this->AreaSingle['AreaName']; ?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Deskription :</label>
                  <textarea name="desk"  class="form-control" id="exampleInputEmail1"><?php echo $this->AreaSingle['Desk']; ?></textarea>
                </div>
				<div class="form-group">
                <label> Country :</label>
                <select name="country" class="form-control " data-placeholder="Select a State"
                        style="width: 100%;">
                  <?php
					foreach($this->country as $key => $values) {
					?>	
                  <option value="<?php echo $values["CountryID"];?>" <?php if($values["CountryID"]==$this->AreaSingle['CountryID']){ echo "Selected";}?>><?php echo $values["CountryName"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="file" name="files" id="uploadfile" class="form-control" />
					</div>
					<?php if ($this->AreaSingle['Images']<>""){ ?><img width="50px" height="50px" src="<?php echo URL.$this->AreaSingle['Images']; ?>"><?php }?>
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
    <strong>Copyright &copy; 2018 APATOOUR.</strong> All rights
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
