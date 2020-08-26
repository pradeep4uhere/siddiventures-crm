<div class="form-group">
 <div class="box-header with-border">
      <h3 class="box-title">Meta Descriptions</h3>
    </div>
</div>


<div class="form-group" style="display:none">
<div class="col-sm-12 col-md-6 col-lg-6">
   <label for="inputPassword3" class=" control-label">Meta Title</label>
  <input type="text" class="form-control" id="metaTitle" placeholder="Meta Title" name="meta_title" value="<?php echo e($page['meta_title']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Meta Description</label>
  <textarea id="meta_description" name="meta_description" style="height: 35px; width: 100%">
    <?php echo e($page['meta_description']); ?>

  </textarea>
</div>
<div class="col-sm-12 col-md-6">
<label for="inputPassword3" class="control-label">Meta Keywords</label>
  <textarea id="meta_keywords" name="meta_keywords"  style="height: 34px; width: 100%">
    <?php echo e($page['meta_keywords']); ?>

  </textarea>
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class=" control-label">Robots</label>
  <input type="text" class="form-control" id="robots" placeholder="Robots" name="robots" value="<?php echo e($page['robots']); ?>">
</div>

<div class="col-sm-12 col-md-6">
   <label for="inputPassword3" class="control-label">Revisit After</label>
  <input type="text" class="form-control" id="revisit_after" placeholder="Revisit After" name="revisit_after" value="<?php echo e($page['revisit_after']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Og Locale</label>
  <input type="text" class="form-control" id="og_local" placeholder="Og Local" name="og_local" value="<?php echo e($page['og_local']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Og Type</label>
  <input type="text" class="form-control" id="og_type" placeholder="Og Type" name="og_type" value="<?php echo e($page['og_type']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class=" control-label">Og Image</label>
  <input type="text" class="form-control" id="og_image" placeholder="Og Image" name="og_image" value="<?php echo e($page['og_image']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Og Title</label>
  <input type="text" class="form-control" id="og_title" placeholder="Og Title" name="og_title" value="<?php echo e($page['og_title']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Og Url</label>
  <input type="text" class="form-control" id="og_url" placeholder="Enter Og URL" name="og_url" value="<?php echo e($page['og_url']); ?>">
</div>

<div class="col-sm-12 col-md-6">
<label for="inputPassword3" class="control-label">Og Description</label><br/>
<textarea id="og_description" name="og_description" style="height: 34px; width: 100%">
    <?php echo e($page['og_description']); ?>

  </textarea>
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Og Site Name</label>
  <input type="text" class="form-control" id="og_site_name" placeholder="Enter Og Site Name" name="og_site_name" value="<?php echo e($page['og_site_name']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Author</label>
  <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="author" value="<?php echo e($page['author']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Canonical</label>
  <input type="text" class="form-control" id="canonical" placeholder="Enter Canonical" name="canonical" value="<?php echo e($page['canonical']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Geo Region</label>
  <input type="text" class="form-control" id="geo_region" placeholder="Enter Geo Region" name="geo_region" value="<?php echo e($page['geo_region']); ?>">
</div>

 <div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Geo Place Name</label>
  <input type="text" class="form-control" id="geo_place_name" placeholder="Enter Geo Place Name" name="geo_place_name" value="<?php echo e($page['geo_place_name']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">Geo Position</label>
  <input type="text" class="form-control" id="geo_position" placeholder="Enter Geo Position" name="geo_position" value="<?php echo e($page['geo_position']); ?>">
</div>

<div class="col-sm-12 col-md-6">
  <label for="inputPassword3" class="control-label">ICBM</label>
  <input type="text" class="form-control" id="icbm" placeholder="Enter ICBM" name="icbm" value="<?php echo e($page['icbm']); ?>">
</div>
</div>
<?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Page/editPageMetaTags.blade.php ENDPATH**/ ?>