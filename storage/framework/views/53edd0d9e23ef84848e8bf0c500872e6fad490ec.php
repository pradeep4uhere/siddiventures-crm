  <section class="content">
      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
      </div>
      <?php endif; ?>
       <p>
        <?php if(Session::has('error')): ?>
        <p class="alert alert-danger"><small>
        <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <b>Error:</b> <?php echo e($err); ?></br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </small>
        </p>
        <?php endif; ?>

      </p>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Page Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
              <div class="box-body">
                <div class="form-group">
                  

                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Menu</label>
                    <select class="form-control" name="menu" onchange="getAjaxCall(this.value)" required="required">
                      <option value="0">Choose Parent Menu</option>
                      <?php foreach($menu as $item){ ?>
                      <?php if($item['parent_id']==0){ ?>
                         <optgroup label="<?php echo e($item['title']); ?>">  
                      <?php } ?>  
                      <option value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
                      <?php if($item['parent_id']==0){ ?>
                        </optgroup>
                      <?php } ?>
                      <?php } ?>
                    </select>
                  </div>

                   <div class="col-sm-12 col-md-6" >
                    <label for="inputEmail3" class="control-label">Sub Menu</label>
                    <p id="sub_category_id">
                    <select class="form-control" name="menu_id">
                      <option value="0">Choose Menu</option>
                    </select>
                  </p>
                  </div>

                </div>
                <div class="form-group">
                  

                 
                </div>
                 <div class="form-group">
                  
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Title<b>*</b></label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" required="required">
                  </div>

                   <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label" name="slug"> Slug Title<b>*</b></label>
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Page Slug" name="slug" required="required">
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
                                <input type="text" class="form-control" id="pageUrl" placeholder="Page URL" name="page_url" >
                            </div>
                      </div>
                    </div>
                  </div>
                
                    <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="inputPassword3" class="control-label">Choose Page Template</label>
                    <select name="page_template" class="form-control">
                      <?php foreach($pageTemplate as $templateItem){ ?>
                      <option value="<?php echo e($templateItem['id']); ?>"><?php echo e($templateItem['template_name']); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
             
         
                
             
                 <div class="form-group">
                  

                  <div class="col-sm-12 col-md-12">
                     <!-- Main content -->
                     <label for="inputPassword3" class=" control-label">Main Page Body<b>*</b></label>
                    <textarea id="editor11" name="body" style="min-height: 250px;" class="jqte-test" required="required">
                      
                    </textarea>
                  </div>
                </div> 

              <!--   <div class="form-group">
                  <div class="col-sm-12 col-md-12">
                     <label for="inputPassword3" class=" control-label">Short Page Description</label>
                      <textarea  class="jqte-test" name="page_excpert" required="required"></textarea>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label">Page Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                </div>
              </div>
           
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
    </div>
    </section>
    <!-- /.content --><?php /**PATH /var/www/html/siddiventures.admin/resources/views/admin/Page/addpageForm.blade.php ENDPATH**/ ?>