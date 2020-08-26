    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Job Banner</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
             <div class="form-group col-md-4">
                <label for="inputPassword" class="col-sm-12 col-md-4 control-label">Banner</label>
                <input  type="file" class="form-control1" id="logo"  name="logo">
                <small style="color: red">Note: Image file size minimim 1200px X 600px</small>
              </div>
              <div class="form-group col-md-4" style="margin-right: 1px;">
                  <label for="inputPassword3" class="control-label">Image Alt Title Text</label>
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt">
                </div>
                 <div class="form-group col-md-4">
                   <label for="inputPassword3" class="control-label">Image Title Text</label>
               
                  <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title">
              </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12">
              <?php if(!empty($page['default_images'])): ?>
                  <label for="inputPassword" class=" control-label"><?php echo app('translator')->get('Banner Preview'); ?></label><br/>
                  <?php $bannerPath = config('global.JOB_IMG_BANNER').'/'.config('global.JOB_THUMB_IMG_WIDTH').'X'.config('global.JOB_THUMB_IMG_HEIGHT').'/'.$page['default_images'];?>
                  <!-- <?php echo e(asset($bannerPath)); ?> -->
                  <img src="<?php echo e(asset($bannerPath)); ?>" style="width:100%" />
                  
                  <div class="col-sm-6 jlkdfj1">
                      <a href="<?php echo e(route('deleteJobImage',['id'=>$page['id']])); ?>">
                      <p id="msg" class="help-block btn btn-danger"><i class="fa fa-trash"></i> Remove</p>
                      </a>
                  </div>
                <?php endif; ?>
              </div>
        </div>
      </div>
      <!-- /.box -->
      </div>
    </section><?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/editpagebanner.blade.php ENDPATH**/ ?>