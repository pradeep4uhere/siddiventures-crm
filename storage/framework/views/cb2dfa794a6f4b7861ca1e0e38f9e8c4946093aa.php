    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Page Banner</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
             <div class="form-group col-md-4">
                <label for="inputPassword" class="col-md-4 control-label" style="text-align: left; margin-left:-15px;">Banner</label>
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
            <div class="col-md-12">
              <div class="form-group col-md-6" style="margin-right: 1px;">
              <label for="inputPassword3" class="control-label" name="slug">Banner Tag Line</label>
              <input type="text" class="form-control" id="tagline" placeholder="Enter Tag Line" name="tagline">
            </div>
               <div class="form-group col-md-6" style="margin-right: 1px;">
                  <label for="inputPassword3" class="control-label">Banner Title</label>
                    <input type="text" class="form-control" id="banner_title" placeholder="Enter Banner Title" name="banner_title">
                </div>
            </div>
             <div class="col-md-12">
                 <div class="form-group col-md-12">
                   <label for="inputPassword3" class="control-label">Banner Description</label>
                  <input type="text" class="form-control" id="image_title" placeholder="Enter Banner Description" name="banner_descriptions">
              </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12">
            <?php if(!empty($page['default_images'])): ?>
                <label for="inputPassword" class=" control-label"><?php echo app('translator')->get('Banner Preview'); ?></label><br/>
                <?php $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_THUMB_IMG_WIDTH').'X'.config('global.JOB_THUMB_IMG_HEIGHT').'/'.$page['default_images'];?>
                <!-- <?php echo e(asset($bannerPath)); ?> -->
                <img src="<?php echo e(asset($bannerPath)); ?>" style="width:100%" />
                </div>
                <div class="col-sm-6 jlkdfj1">
                    <p id="msg" class="help-block btn btn-danger"><i class="fa fa-trash"></i> Remove</p>
                </div>
              <?php endif; ?>
            </div>
        </div>
      </div>
      <!-- /.box -->
      </div>
    </section><?php /**PATH /var/www/html/siddiventures.admin/resources/views/admin/Page/pagebanner.blade.php ENDPATH**/ ?>