<style>
        
        .imgList{
            display: block;
            float: left;
            padding: 10px;
            margin: 5px;
            border: 1px solid rgba(152, 152, 152, 0.95);
            border-radius: 5px;
        }
        .imgList h3{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            text-align: left;
            font-weight: bold;
            padding: 0px;
			margin:0;
        }
		.imgList .desk{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            text-align: left;
            display:block;
			margin-top:5px;
			margin-bottom:5px;
        }
        .del{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            width:100%;
        }
    </style> 
<div class="content-wrapper">
<section class="content container-fluid">

<div class="clearfix"></div>
    <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Choose Package
			          <br><small><a href="<?php echo URL."admin/setarea/";?>" class="btn btn-success btn-xs">Back</a></small></h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->
			<div class="row col-sm-12">
                        <?php
                        foreach ($this->mylist as $key => $value){
                        ?>
                        
                            <div class="imgList col-sm-3">
								<h3><?php echo $value['AreaName']; ?></h3>
								<div class="desk"><?php echo substr($value['Desk'],0,100); ?>								
								<a class="del btn btn-success" href="#" rel="<?php echo $value['AreaID']; ?>" rels="<?php echo $value['AreaID']; ?>"> Add To FrontPage </a>
								</div>
							</div>
                        <?php } ?>
                        

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
<!-- Slimscroll -->
<script src="<?php echo URL;?>include/plugin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL;?>include/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL;?>include/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>


<script>

$('.del').click(function(){
    delItem=$(this).parent().parent();
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("<?php echo URL.'admin/';?>savesetarea",{gid:gid,prid:prid},function(x){
       //alert(x);
       delItem.remove();
    });
    return false;
    
});
</script>