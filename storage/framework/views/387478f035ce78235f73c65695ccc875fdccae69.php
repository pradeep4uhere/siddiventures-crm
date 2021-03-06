<div class="form-group">
 <div class="box-header with-border">
              <h3 class="box-title">Page Banner</h3>
            </div>
</div>

<div class="form-group">
<div class="col-sm-12 col-md-4 col-lg-4">
    <label for="inputPassword" class="control-label">Banner</label>
    <input  type="file" class="form-control1" id="logo"  name="logo">
</div>

<div class="col-sm-12 col-lg-4 col-md-4">
  <label for="inputPassword3" class="control-label">Image ALT Text</label>
  <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt" value="<?php echo e($page['image_alt']); ?>">
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
  <label for="inputPassword3" class="control-label">Image Title Text</label>
  <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title" value="<?php echo e($page['image_title']); ?>">
</div>
</div>
 <div class="form-group">
  <div class="col-sm-12 col-md-6">
    <label for="inputPassword3" class="control-label" name="slug">Banner Tag Line</label>
    <input type="text" class="form-control" id="tagline" placeholder="Enter tage line" name="tagline" value="<?php echo e($page['tagline']); ?>">
  </div>
    <div class="col-md-6" >
      <label for="inputPassword3" class="control-label">Banner Title</label>
        <input type="text" class="form-control" id="banner_title" placeholder="Enter Banner Title" name="banner_title" value="<?php echo e($page['banner_title']); ?>">
    </div>
</div>
<div class="form-group">

     <div class="col-md-12">
       <label for="inputPassword3" class="control-label">Banner Description</label>
   
      <input type="text" class="form-control" id="image_title" placeholder="Enter Banner Description" name="banner_descriptions" value="<?php echo e($page['banner_descriptions']); ?>">
  </div>
</div>
<div class="form-group">
<div class="col-sm-12 col-lg-12 col-md-12">
<?php if(!empty($page['default_images'])): ?>
    <label for="inputPassword" class=" control-label"><?php echo app('translator')->get('Banner Preview'); ?></label><br/>
    <?php $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_THUMB_IMG_WIDTH').'X'.config('global.PAGE_THUMB_IMG_HEIGHT').'/'.$page['default_images'];?>
    <!-- <?php echo e(asset($bannerPath)); ?> -->
    <img src="<?php echo e(asset($bannerPath)); ?>" style="width:100%" />
    
    <div class="col-sm-6">
        <a id="msg" class="btn btn-warning" style="margin-left: -14px; margin-top: 10px;" href="<?php echo e(route('deletebannerimage',['id'=>$page['id']])); ?>" onclick="return confirm('Are you sure you want to remove banner of this page?')"><i class="fa fa-trash"></i> Remove Banner</a>
    </div>
  <?php endif; ?>
</div>
</div>

<?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Page/editPageBanner.blade.php ENDPATH**/ ?>