 <?php 
//include('views/header.php');
?>
<link rel="stylesheet" href="<?php echo URL;?>include/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Property List : </h3><br>
			  <small><a class="btn btn-success btn-xs" href="<?php echo URL;?>admin/useradd">Add New</a></small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <tr class="headings">
                    <th class="column-title">ID </th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Username </th>
					<th class="column-title">Level </th>
                    <th class="column-title">Status </th>
                    <th class="column-title">Edit </th>
                    <th class="column-title no-link last"><span class="nobr">Void</span>
                    </th>
                    
                    </tr>
                    </thead>

                    <tbody>
                         <?php
                        foreach ($this->msuList as $key => $value) {
                            ?>
                        <tr class="even pointer">                            
                            <td class=" "><?php echo $value['userID']; ?></td>
                            <td class=" "><?php echo $value['Name']; ?> </td>
                            <td class=" "><?php echo $value['username']; ?></td>
							<td class=" "><?php echo $value['TypeName']; ?></td>
                            <td class=" "><?php if($value['aktif']==1){ echo 'Aktif';}else{echo 'Non-Aktif';} ?></td>
                            <td class=" "><a href='<?php echo URL;?>admin/useredit/<?php echo $value['userID']; ?>'> Edit </a></td>
                            <td class=" last"><a href="<?php echo URL;?>admin/uservoid/<?php echo $value['userID']; ?>">Void</a>
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
  <div class="control-sidebar-bg"></div>
</div>

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