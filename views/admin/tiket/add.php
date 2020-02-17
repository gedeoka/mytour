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
        Add New Page &#39;
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
        <form role="form" action="<?php echo URL."admin/savepage";?>" method="POST">
		<div class="box box-default">

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
			<div class="form-group">
                  <label>Title</label>
                  <input name="title"  id="title" type="text" class="form-control" placeholder="Enter Page Title" maxlength="200" required>
				  <input name="slug"  id="slug" type="hidden" class="form-control" placeholder="Enter Page Title" maxlength="200" required>
				  <small><div id="url">URL : </div></small>
                </div>
              
              <!-- Minimal style -->

              <div class="box-body pad">
				
					<label>	Content			
						<textarea name="desk" class="textarea" placeholder="Package Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</label>
				
             </div>
              	
            </div>
            <!-- /.col -->
            
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
  
$("#title").change(function(){
    
	var str = $(this).val();
	str = str.replace(/\s+/g, '-');
	//alert(str);
	var url=str;
	var urls="URL : <?php echo URL."page/?pages=";?>"+str;
	$("#slug").val(url);
	
	$("#url").html(urls);
	return false;
});
	

</script>
