<?php $__env->startSection('content'); ?>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrappers">
    <!-- Content Header (Page header) -->
    <section class="content">
      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
      </div>
      <?php endif; ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <div class="box-header with-border">
              <h3 class="box-title">Enter Page Content Details</h3>
          </div>
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
          <div class="box box-danger">
          
          <!-- /.box-header -->
            <!-- /.box-header -->
            <div class="box-body">
                <!-- right column -->
        <div class="col-md-12">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('addcontent',['id'=>$id])); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
              
                 <div class="form-group">
               

                   <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Content Title</label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title">
                  </div>

                </div>
               
               
              
                 <div class="form-group">
                  <div class="col-sm-12">
                  <label for="inputPassword3" class="control-label">Page Content Body</label><br/>
                     <!-- Main content -->
                    <textarea id="editor111" name="body" rows="10" cols="80" class="jqte-test">
                      Page Body Goes Here
                    </textarea>
                  </div>

                     <div class="col-sm-12 col-md-6">
                      <label for="inputPassword3" class="control-label">Box Content Order</label>
                      <select class="form-control" name="order_no">
                      <?php for($i=1;$i<20;$i++){ ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                      <?php } ?>
                      </select>
                  </div>

                     <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Link</label>
                    <select class="form-control" name="page_link_id">
                      <option value="0">--Choose Page--</option>
                      <?php foreach($pageList as $pageItem){  ?>
                          <option value="<?php echo e($pageItem['id']); ?>" ><?php echo e($pageItem['title']); ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>


                </div>
                  <div class="form-group">
                      <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Name</label>
                    <input type="text" class="form-control" id="content_name" placeholder="Enter Page Content Name" name="content_name">
                    <small style="color:red"><i>This Name is Only for Reference, not visible on frontend</i></small>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">External Content URL</label>
                    <input type="text" class="form-control" id="url" placeholder="Enter External Content URL" name="url">
                  </div>

               
                </div>
                <div class="form-group">
                 
                
                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-1</label>
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1">
                </div>
                 

                <div class="col-sm-12 col-md-6">

                  <label for="inputEmail3" class="control-label">Text Line-2</label>
                  <input type="text" class="form-control" id="field_2" placeholder="Enter Text " name="field_2">
                </div>

                   <div class="col-sm-12 col-md-6">
                <label for="inputEmail3" class="control-label">Text Line-3</label>
                <input type="text" class="form-control" id="field_3" placeholder="Enter Text " name="field_3">
              </div>

               <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-4</label>
                  <input type="text" class="form-control" id="field_4" placeholder="Enter Text " name="field_4">
                </div>

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-5</label>
                  <input type="text" class="form-control" id="field_5" placeholder="Enter Text " name="field_5">
                </div>



   <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label">Page Content Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                  </div>


              </div>
           
                <div class="form-group">
             
               
               
                 
              </div>
            
              <div class="form-group">
                
            
      
              <!-- /.box-footer -->

            <?php echo $__env->make('admin.Page.PageContent.pageContentImageTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
          <!-- /.box -->
         
        </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     
      <!-- /.row -->

     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->

  <!-- ./wrapper -->
<script src="<?php echo e(config('global.BACKENDCMS')); ?>/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#addMore').on('click',function(){
    //alert(88);
    var banner = "<div class='form-group col-md-4'><label for='inputPassword' class=' control-label'>Banner</label><input  type='file' class='form-control1'  name='logo[]'></div>";
    var imageAlt = "<div class='form-group col-md-4'><label for='inputPassword3' class='control-label'>Image ALT Text</label> <input type='text' class='form-control' id='image_alt' placeholder='Enter Image Alt Text' name='image_alt[]'></div>";
    var imageTitle="<div class='form-group col-md-4'><label for='inputPassword3' class='control-label'>Image Title Text</label><input type='text' class='form-control' id='image_title' placeholder='Enter Image Title Text' name='image_title[]'></div>";
    $("#addmoreDiv").append(banner+imageAlt+imageTitle);
  });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Page/PageContent/addPageContentTemplate.blade.php ENDPATH**/ ?>