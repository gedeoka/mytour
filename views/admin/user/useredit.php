 <?php 
//include('views/header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New User
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<div class="box-body">
         <div class="row">
                        <form id="demo-form2" data-parsley-validate="" action="<?php echo URL; ?>admin/usersaveEdit/<?php echo $this->msuListSingle['userID'];?>" class="form-horizontal form-label-left" novalidate="" method="POST">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >UserName <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input disabled type="text" name="uname" id="first-name" required="required"  value="<?php echo $this->msuListSingle['username'];?>" class="form-control col-md-7 col-xs-12" data-parsley-id="9936"><ul class="parsley-errors-list" id="parsley-id-9936"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="8158"><input type="hidden" name="password0" value="<?php echo $this->msuListSingle['password'];?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="8158"><ul class="parsley-errors-list" id="parsley-id-8158" ></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" name="name"  value="<?php echo $this->msuListSingle['Name'];?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
							<div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Level </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
								<select name="Type" class="form-control">

								  <?php
									foreach($this->LvlList as $key => $value) {
									?>	
									
									<option <?php
									if($value["TypeID"]==$this->msuListSingle["TypeID"]){
										echo "selected " ;
									}
									?> value="<?php echo $value["TypeID"];?>"><?php echo $value["TypeName"];?></option>
									<?php }?>
								</select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
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