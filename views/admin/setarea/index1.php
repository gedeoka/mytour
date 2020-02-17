
<div class="content-wrapper">
<section class="content container-fluid">


<div class="clearfix"></div>
    <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title"><?php echo $this->Title;?></h3><br>
			  <small> <a class="btn btn-success btn-xs" href="<?php echo URL;?>admin/addsetarea/">Add New</a>  </small>
            </div>
            <div class="box-body">
              <!-- Minimal style -->
			
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Area Name</th>
                  <th> Description</th>
				  
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
                        foreach ($this->mylist as $key => $value) {
                            ?>
                <tr>
                  <td><?php echo $value['AreaName']; ?></td>
                  <td><?php echo substr($value['Desk'],0,100); ?></td>
				  <td><a class="del btn btn-warning" href="#" rel="<?php echo $value['AreaID']; ?>" rels="<?php echo $value['AreaID']; ?>"> Remove Promo </a></td>
                </tr>
                <?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
             </div>
            </div>
            <!-- /.box-body -->
            
          </div>
</section>
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
  });

$('.del').click(function(){
    //delItem=$(this).parentNode.rowIndex;
    //document.getElementById("example1").deleteRow(i);
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("<?php echo URL.'admin/';?>delsetArea",{gid:gid,prid:prid},function(x){
        //alert(x);
       //delItem.remove();
	   //document.getElementById("example1").deleteRow(delItem);
	   window.top.location.reload(false);
    });
    return false;
    
});
</script>