<style>
        #selectedimage img{
            height: 150px;
            width: 150px;
        }
        .imgList{
            display: block;
            float: left;
            padding: 10px;
            margin: 10px;
            border: 1px solid rgba(152, 152, 152, 0.95);
            border-radius: 5px;
        }
        .imgList img{
            height: 150px;
            width: 180px;
            border: 1px solid rgba(152, 152, 152, 0.95);
        }
        .imgList p{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            text-align: center;
            font-weight: bold;
            padding-top: 2px;
        }
        .del{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            width:100%;
			margin-bottom:5px;
        }
		.def{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            width:100%;
			margin-bottom:5px;
        }
		.unset{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            width:100%;
			margin-bottom:5px;
        }
    </style> 
<div class="content-wrapper">
<section class="content container-fluid">
<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Description</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data" name="myForm" id="imageuploadFrom" class="form-horizontal form-label-left">
              <!-- Minimal style -->
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Deskription</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name" placeholder="Default Input" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="files" id="uploadfile" class="form-control" required/>
                        </div>
                    </div>
                    <div id="selectedimage"></div>
                    <p id="errors"></p>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
            <!-- /.box-body -->
            
          </div>

        
    </div>

<div class="clearfix"></div>
    <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">List Image :</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->
			<div class="row">
                        <?php
                        foreach ($this->GalList as $key => $value){
                        ?>
                        
                            <div class="imgList">
                                    <img src="<?php echo URL.$value['thumb']; ?>">
                                    <p><?php echo $value['Name']; ?></p>
                                    <a class="del btn btn-danger" href="#" rel="<?php echo $value['GalleryID']; ?>" rels="<?php echo $value['WeddingID']; ?>"> Delete </a>
									<br>
									<?php 
									if ($value["Def"]==0){
										?>
										<a class="def btn btn-primary" href="#" rel="<?php echo $value['GalleryID']; ?>" rels="<?php echo $value['WeddingID']; ?>"> Set Default </a>
										<?php
									}else{
										?>
										<a class="unset btn btn-success" href="#" rel="<?php echo $value['GalleryID']; ?>" rels="<?php echo $value['WeddingID']; ?>"> Unset Default </a>
										<?php
									}
									?>
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
<script src="<?php echo URL;?>include/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo URL;?>include/plugin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL;?>include/plugin/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL;?>include/plugin/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo URL;?>include/plugin/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL;?>include/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL;?>include/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>


<script>
 
$('#uploadfile').on('change', showfiles);

function showfiles(event){
	$("#errors").empty();
	$("#selectedimage").empty();
	files = event.target.files;

	var error = 0;
	var errorMessage = "";
	

	for (var i = 0; i < files.length; i++) {
		file = files[i];
		if(!file.type.match('image.*')){
		/* Check if the selected file is an image or not */
			error = 1;
			errorMessage = "\"" + file.name + "\"" + errorMessage ;
		}else{
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function() {

				console.log(reader.result);
				var img = new Image();		
				img.src = reader.result;
				$("#selectedimage").append(img);
			};
		}
	}

	if(error && errorMessage){
		/* If error variable is triggered print error*/
		errorMessage = errorMessage + " is not image file";
		$("#errors").append(errorMessage);	
	}
}
$('.del').click(function(){
    delItem=$(this).parent();
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("<?php echo URL.'admin/weddingdelgal';?>",{gid:gid,prid:prid},function(x){
        //alert(x);
       delItem.remove();
    });
    return false;
    
});
$('.def').click(function(){
//alert("def");
    delItem=$(this).parent();
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("<?php echo URL.'admin/weddingdefg';?>",{gid:gid,prid:prid},function(x){
       location.reload();
    });
    //return false;
    
});
$('.unset').click(function(){
    delItem=$(this).parent();
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("<?php echo URL.'admin/weddingunsetg';?>",{gid:gid,prid:prid},function(x){
       location.reload();
    });
    // false;
    
});
</script>