<?php $__env->startSection('content'); ?>
<style type="text/css">
  .mendetetory{
    font-size: 12px;
    font-weight: bold;
    color:red;
  }
</style>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrappers">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
      </div>
      <?php endif; ?>
       <?php if(Session::has('message')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('message')); ?></p>
      </div>
      <?php endif; ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
           <div class="box-header with-border">
              <h3 class="box-title">Edit Page Content Details</h3>
            </div>
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('editcontent',['id'=>$id])); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                
               
                
              
                 <div class="form-group">

           

                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Content Title<small class="mendetetory">*</small></label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" value="<?php echo e($Page['title']); ?>">
                  </div>
                  
                  <div class="col-sm-12 col-md-12">
                     <!-- Main content -->
                    <label for="inputPassword3" class="control-label">Page Box Body</label>
                    <textarea id="editor111" name="body" rows="10" cols="80" placeholder="Enter Page Content Description" class="jqte-test">
                      <?php echo e($Page['description']); ?>

                    </textarea>
                  </div>
                      <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label">Content Order<small class="mendetetory">*</small></label>
                    <select class="form-control" name="order_no">
                    <?php for($i=1;$i<50;$i++){ ?>
                      <option value="<?php echo e($i); ?>" <?php if($Page['order_no']==$i){ echo "selected='selected'"; } ?>><?php echo e($i); ?></option>
                    <?php } ?>
                    </select>
                </div>
                </div>
                 <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Name</label>
                    <input type="text" class="form-control" id="content_name" placeholder="Enter Page Content Name" name="content_name" value="<?php echo e($Page['content_name']); ?>">
                    <small><i>This Name is Only for Reference, not visible on frontend</i></small>
                  </div>
                      <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">External Content URL</label>
                    <input type="text" class="form-control" id="url" placeholder="Enter Page Content URl" name="url" value="<?php echo e($Page['url']); ?>">
                  </div>

                </div>
                <div class="form-group">
                
                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-1</label>
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1" value="<?php echo e($Page['field_1']); ?>">
                </div>

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class=" control-label">Text Line-2</label>
                  <input type="text" class="form-control" id="field_2" placeholder="Enter Text " name="field_2" value="<?php echo e($Page['field_2']); ?>">
                </div>
           

                <div class="col-sm-12 col-md-6">
                   <label for="inputEmail3" class=" control-label">Text Line-3</label>
                  <input type="text" class="form-control" id="field_3" placeholder="Enter Text " name="field_3" value="<?php echo e($Page['field_3']); ?>">
                </div>

                 <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-4</label>
                  <input type="text" class="form-control" id="field_4" placeholder="Enter Text " name="field_4" value="<?php echo e($Page['field_4']); ?>">
                </div>


                     <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Box Text Line-1</label>
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1" value="<?php echo e($Page['field_1']); ?>">
                </div>

              
                

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">Text Line-5</label>
                  <input type="text" class="form-control" id="field_5" placeholder="Enter Text " name="field_5" value="<?php echo e($Page['field_5']); ?>">
                </div>
              </div>

 <div class="form-group">
                  

              
                    <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Link</label>
                    <select class="form-control" name="page_link_id">
                      <option value="0">--Choose Page--</option>
                      <?php foreach($pageList as $pageItem){  ?>
                          <option value="<?php echo e($pageItem['id']); ?>" <?php if($Page['page_link_id']==$pageItem['id']){ ?> selected="selected" <?php } ?>><?php echo e($pageItem['title']); ?></option>
                      <?php } ?>
                    </select>
                    
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
                <?php if(count($Page['page_content_image'])>0){ ?>
                <?php foreach($Page['page_content_image'] as $pageImage){ ?>
                <?php $bannerPath = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_500PX_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_500PX_HEIGHT').'/'.$pageImage['default_images'];?>
                        <!-- <?php echo e(asset($bannerPath)); ?> -->
                  
                   <div class="form-group">
                    
                    <div class="col-sm-12 col-md-12">
                       <label for="inputPassword" class="control-label">Image Preview [500X500]</label><br/>
                        <img src="<?php echo e(asset($bannerPath)); ?>"  alt="<?php echo e($pageImage['image_alt']); ?>" title="<?php echo e($pageImage['image_title']); ?>" />
                    </div>
                    <?php $bannernewPath = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$pageImage['default_images'];?>
                    <!-- <div class="col-sm-12 col-md-12">
                       <label for="inputPassword" class="control-label">Image Preview[1920X800]</label><br/>
                         
                        <img src="<?php echo e(asset($bannernewPath)); ?>"  alt="<?php echo e($pageImage['image_alt']); ?>" title="<?php echo e($pageImage['image_title']); ?>" />
                    </div> -->
                    </div>

                  <div class="form-group">
                  <div class="col-sm-12 col-md-3"  style="padding-top: 15px; font-weight: bold; ">
                    <div class="radio">
                    <label class=" control-label">
                      <input type="radio" name="image_default" id="optionsRadios<?php echo e($pageImage['id']); ?>" value="<?php echo e($pageImage['id']); ?>" <?php if($pageImage['is_default']==1){ ?> checked="checked" <?php } ?>>
                      <b>Is this Image is Default ?</b>
                    </label>
                  </div>
                    
                    
                  </div>
                  <div class="col-sm-12 col-md-3">
                    <label for="inputPassword3" class=" control-label">Image ALT Text</label>
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]" value="<?php echo e($pageImage['image_alt']); ?>">
                  </div>
                    <div class="col-sm-10 col-md-3">
                    <label for="inputPassword3" class="control-label">Image Title Text</label>
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]" value="<?php echo e($pageImage['image_title']); ?>">
                  </div>
               
                 
                  <div class="col-md-3 pull-right" style="padding-top: 20px;">
                    <label for="inputPassword3" class="control-label">&nbsp;</label>
                    <a href="<?php echo e(route('deletecontentimage',['id'=>$pageImage['id']])); ?>" class="btn btn-danger pull-right"><i class="fa fa-trash"></i>&nbsp;Remove Image</a>
                  </div>
                </div>

                  <?php }} ?>
                   
                <div class="form-group">
                    <div class="col-sm-12 col-md-4">
                      <label for="inputPassword" class="control-label">Image Upload</label>
                        <input  type="file" class="form-control1" id="logo"  name="logo[]">
                    </div>

                      <div class="col-sm-12 col-md-4">
                    <label for="inputPassword3" class="control-label">Image ALT Text</label>
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]">
                  </div>

                   <div class="col-sm-12 col-md-4">
                    <label for="inputPassword3" class="control-label">Image Title Text</label>
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]">
                  </div>

                    </div>
               
               
                <div id="addmoreDiv"></div>
                <div class="form-group ">
                  <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10 pull-right">
                    <a href="javascript:void(0)" class="btn btn-warning pull-right" id="addMore"><i class="fa fa-image"></i> Add More Image</a>
                  </div>
                </div>

             

              
               
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
                <button type="submit" class="btn btn-danger pull-right Cancel" style="margin-right:10px; ">Cancel</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- /.box -->
         
        </div>
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
    var banner = "<div class='form-group'><div class='col-sm-12 col-md-4'><label for='inputPassword' class='control-label'>Banner</label><input  type='file' class='form-control1'  name='logo[]'></div>";
    var imageAlt = "<div class='col-sm-12 col-md-4'><label for='inputPassword3' class='control-label'>Image ALT Text</label><input type='text' class='form-control' id='image_alt' placeholder='Enter Image Alt Text' name='image_alt[]'></div>";
    var imageTitle="<div class='col-md-4'><label for='inputPassword3' class='control-label'>Image Title Text</label><input type='text' class='form-control' id='image_title' placeholder='Enter Image Title Text' name='image_title[]'></div></div>";
    $("#addmoreDiv").append(banner+imageAlt+imageTitle);
  });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Page/PageContent/editPageContentTemplate.blade.php ENDPATH**/ ?>