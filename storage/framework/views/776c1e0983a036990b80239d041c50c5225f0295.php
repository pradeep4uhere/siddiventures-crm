 <div class="form-group">
<div class="col-sm-6 col-md-6 col-lg-6">
   <label for="inputEmail3" class=" control-label">Menu</label>
  <select class="form-control" name="menu" onchange="getAjaxCallSingle(this.value)">
    <option value="0">Choose Parent Menu</option>
    <?php foreach($menu as $item){ ?>
    <option value="<?php echo e($item['id']); ?>" <?php if($page['parent_menu_id']==$item['id']){ ?> selected="selected" <?php  }?>><?php echo e($item['title']); ?></option>
    <?php } ?>
  </select>
</div>
<div class="col-sm-6  col-md-6 col-lg-6">
<label for="inputEmail3" class="control-label">Sub Menu</label>
<div id="sub_category_id">
  <select class="form-control" name="menu_id" id="menu_idmenu_id">
    <?php if(!empty($menuList)){?>
    <?php foreach($menuList as $item){ ?>
      <option value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
    <?php } ?>
    <?php } ?>
  </select>
</div>
</div>
</div>

<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">Page Title</label>
    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" value="<?php echo e($page['title']); ?>">
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Slug Title</label>
    <input type="text" class="form-control" id="inputPassword3" placeholder="Page Slug" name="slug"  value="<?php echo e($page['slug']); ?>">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-12 col-md-6 col-lg-6">
  <label for="inputPassword3" class="control-label">Page Url</label>
    <div class="row">
      <div class="col">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <input type="text"  readonly="readonly" name="hiddenUrl" value="<?php echo e(env('APP_URL')); ?>" class="form-control"/>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <input type="text" class="form-control" id="pageUrl" placeholder="Page URL" name="page_url" value="<?php echo e($page['page_url']); ?>">
            </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label">Choose Page Template</label>
    <select name="page_template" class="form-control">
      <?php foreach($pageTemplate as $templateItem){ ?>
      <option value="<?php echo e($templateItem['id']); ?>" <?php if($page['page_template_id']==$templateItem['id']) { ?> selected="selected" <?php } ?>><?php echo e($templateItem['template_name']); ?></option>
      <?php } ?>
    </select>
  </div>

</div>

 <div class="form-group">
  <div class="col-sm-12">
  <label for="inputPassword3" class=" control-label">Main Page Body</label>
     <!-- Main content -->
    <textarea id="editor11" name="body" rows="10" cols="80" class="jqte-test">
      <?php echo e($page['description']); ?>

    </textarea>
  </div>
</div>

 <div class="form-group">
  <div class="col-sm-12 col-md-12">
     <!-- Main content -->
     <label for="inputPassword3" class=" control-label">Short Page Description</label>
      <textarea  class="jqte-test" name="page_excpert"><?php echo e($page['page_excpert']); ?></textarea>
  </div>
</div><?php /**PATH /var/www/html/cms-content/resources/views/admin/Page/editPageBody.blade.php ENDPATH**/ ?>