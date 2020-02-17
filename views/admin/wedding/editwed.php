<?php 
//include('views/header.php');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>include/plugin/iCheck/all.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Wedding Package
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<div class="box-body">
         <div class="row">
        <form role="form" action="<?php echo URL."admin/updatewedding";?>" method="POST">
		<div class="box box-default">

        <!-- /.box-header -->
		<!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
			<div class="form-group">
                  <label>Package Code</label>
                  <input name="WeddingCode" type="text" class="form-control" placeholder="Enter Package Code" maxlength="200" value="<?php echo $this->singlewedding[0]["WeddingCode"];?>" required>
				  
                </div>
              <div class="form-group">
                  <label>Package Name</label>
                  <input name="WeddingName" type="text" class="form-control" placeholder="Enter Package Name" maxlength="50" value="<?php echo $this->singlewedding[0]["WeddingName"];?>" required>
				  <input name="WeddingID" type="hidden" class="form-control"  value="<?php echo $this->singlewedding[0]["WeddingID"];?>" required>
                </div>
				
              <!-- /.form-group -->
              <div class="form-group">
                <label> Area :</label>
                <select name="area" class="form-control " data-placeholder="Select a State"
                        style="width: 100%;">
                  <?php
					foreach($this->areas as $key => $values) {
					?>	
                  <option value="<?php echo $values["AreaName"];?>" <?php if($values["AreaName"]==$this->singlewedding[0]["Area"]){ echo "Selected";}?>><?php echo $values["AreaName"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
                <label> Country :</label>
                <select name="country" class="form-control " data-placeholder="Select a State"
                        style="width: 100%;">
                  <?php
					foreach($this->country as $key => $values) {
					?>	
                  <option value="<?php echo $values["CountryID"];?>" <?php if ($this->singlewedding[0]["CountryID"]==$values["CountryID"]){ echo "Selected";}?>><?php echo $values["CountryName"];?></option>
					<?php }?>
                </select>
				</div>
				<div class="form-group">
                <label> EO Category :</label>
                <select name="wedtype" class="form-control " data-placeholder="Select a State"
                        style="width: 100%;">
                  <?php
					foreach($this->Type as $key => $values) {
					?>	
                  <option value="<?php echo $values["ID"];?>" <?php if ($this->singlewedding[0]["WedType"]==$values["ID"]){ echo "Selected";}?>><?php echo $values["Name"];?></option>
					<?php }?>
                </select>
				</div>

              <!-- Minimal style -->

              <div class="box-body pad">
				
					<label>	Package Description				
						<textarea name="desk" class="textarea" placeholder="Package Descriptions."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $this->singlewedding[0]["Desk"];?></textarea>
					</label>
				
             </div>
              	 <div class="box-body pad">
				
					<label>	Term and Condition : 	
						<textarea name="term" class="textarea" placeholder="Term And Condition."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $this->singlewedding[0]["Term"];?></textarea>
					</label>
				
             </div>	  
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            
              <!-- Minimal style -->
				<div class="form-group">
				<label>Validity From:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="StartDate" class="form-control pull-right" id="datepicker" value="<?php echo date("m/d/Y",strtotime($this->singlewedding[0]["StartDate"]));?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>To:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="EndDate" class="form-control pull-right" id="datepicker2" value="<?php echo date("m/d/Y",strtotime($this->singlewedding[0]["EndDate"]));?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                  <label>Price per Package:</label>
                 <br>
				 <input name="Cur" id="Cur" type="hidden" class="form-control" value="USD"> 
				 <input name="Price1" id="Price1" type="number" class="form-control"  value="<?php echo $this->singlewedding[0]["Price1"];?>"
				
                </div>
				
              <div class="box-body pad">
				
					<label>	Inclusion : 	
						<textarea name="Inclusion" class="textarea" placeholder="Inclusion."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $this->singlewedding[0]["Inclusion"];?></textarea>
					</label>
				
             </div>
			  
           
              <div class="box-body pad">
				
					<label>				Exlusion:
						<textarea name="Exclusion" class="textarea" placeholder="Exclusion."
                          style="width: 100%; height: 150px; font-size: 14px; font-weight:normal; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $this->singlewedding[0]["Exclusion"];?></textarea>
					</label>
				
             </div>
             
            <!-- /.col -->
			
          </div>
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
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
<script src="<?php echo URL;?>include/plugin/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo URL;?>include/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
  
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
	$('#datepicker').datepicker({
      autoclose: true
    })
	$('#datepicker2').datepicker({
      autoclose: true
    })
    
  })
  function listIten(){
		//alert("Process");
		var dayx =$('#Day').val();
		//alert(dayx);
		$('#Extra').empty();
		for(i=1;i<=dayx;i++){
			//alert(i);
			$('#Extra').append('<div class="box-body pad"> <div class="form-group"> <label>Itenery for Day '+i+'</label>   <textarea name="tour[]" id="desk" class="textarea1" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> </div>');
			
		}
		$('.textarea1').wysihtml5();
		return false;
	}
	

</script>
