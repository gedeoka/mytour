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
        Tour Booking Request
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
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
                  <th>No.Book</th>
                  <th>Booking Date</th>
				  <th>Package</th>
				  <th>Periode</th>
				  <th>Pax</th>
				  <th>Total</th>
				  <th>Contact</th>
				  <th>GuestName</th>
				  <th>Request</th>
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
                        foreach ($this->listarea as $key => $value) {
							
				  switch ($value["Packagetype"]){
					case "1":
					$pname = Code::GetField('tour','TourName',"TourID='".$value["PackageID"]."'");
					$pcode = Code::GetField('tour','TourCode',"TourID='".$value["PackageID"]."'");
					if(Code::GetField('tour','sts',"TourID='".$value["PackageID"]."'")==1){
						$pax="Adult : ".$value["Adult"]."<br>Child : ".$value["child"];
					}else{
							$pax=" 1 Couple";
					}
					break;
					case "2":
					$pname= Code::GetField('yoga','YogaName',"YogaID='".$value["PackageID"]."'");
					$pcode= Code::GetField('yoga','YogaCode',"YogaID='".$value["PackageID"]."'");
					$pax=$value["Adult"]." Pax";
					break;
					case "3":
					$pname= Code::GetField('wedding','WeddingName',"WeddingID='".$value["PackageID"]."'");
					$pcode= Code::GetField('wedding','WeddingCode',"WeddingID='".$value["PackageID"]."'");
					$pax=" 1 Couple";
					break;
				  }
				  switch ($value["Payment"]){
					case "1":
					$psts="<small class=\"label pull-right bg-red\">UnPaid</small>";
					break;
					case "2":
					$psts="<small class=\"label pull-right bg-green\">Paid</small>";
					break;
				  }
				  switch ($value["Status"]){
					case "1":
					$pss="<small class=\"label pull-right bg-yellow\">Booking</small>";
					break;
					case "2":
					$pss="<small class=\"label pull-right bg-green\">Confirm</small>";
					break;
					case "0":
					$pss="<small class=\"label pull-right bg-red\">Cancel</small>";
					break;
				  }
				  
                            ?>
                <tr>
                  <td><?php echo $value['OrderID']; ?></td>
                  <td><?php echo date("d/m/Y",strtotime($value['Bookdate'])); ?></td>
				  <td><?php echo $pcode." - ".$pname; ?></td>
				  <td><?php echo "Checkin : ".date("d/m/Y",strtotime($value['CheckIn']))."<br>CheckOut : ".date("d/m/Y",strtotime($value['CheckOut'])); ?></td>
				  <td><?php echo $pax; ?></td>
				  <td><?php echo $value['Cur']." ".$value['TotalPrice']; ?></td>
				  <td><?php echo "Name : ".$value['Contact']."<br> Email : ".$value['Email']."<br>Ph : ".$value['Phone']; ?></td>
				  		
				  <td><?php echo $value['Guest']; ?></td>			
				  <td><?php echo $value['Remark']; ?></td>		
                  <td><?php echo $pss."<br>".$psts; ?></td>
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