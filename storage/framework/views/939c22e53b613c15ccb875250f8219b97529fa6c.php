    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Other Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo e($setting[30]['type_name']); ?></small></label>
                  <input type="text" class="form-control" id="when_start" name="when_start" placeholder="Enter Details" value="<?php echo e($setting[30]['value']); ?>">
                </div>

             
             
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Number Of List</label>
                  <small>&nbsp;&nbsp;(How many number of item show in list)</small>
                  <input type="text" class="form-control" id="extra_1" placeholder="Enter Details" name="extra_1" value="<?php echo e($setting[19]['value']); ?>">
                </div>
 
         


             
          </div>
        
         
        </div>
      </div>
      <!-- /.box -->

      </div>
    </section>
    <!-- /.content --><?php /**PATH /var/www/html/cms-content/resources/views/admin/Setting/WhenStartSetting.blade.php ENDPATH**/ ?>