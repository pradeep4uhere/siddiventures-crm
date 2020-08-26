 
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">General Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Application Name</label>
                  <input type="text" class="form-control" id="app_name" placeholder="Enter application name" name="<?php echo e($setting[0]['type']); ?>" value="<?php echo e($setting[0]['value']); ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">App URL</label>
                  <input type="text" class="form-control" id="app_url" placeholder="Enter application url" name="<?php echo e($setting[2]['type']); ?>" value="<?php echo e($setting[2]['value']); ?>">
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="text" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number" value="<?php echo e($setting[1]['value']); ?>">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Footer Copyrights</label>
                  <input type="text" class="form-control" id="copy_rights" name="copy_rights" placeholder="Enter Copy Rights" value="<?php echo e($setting[13]['value']); ?>">
                </div>


            <div class="form-group">
                  <label for="exampleInputEmail1">Service Time</label>
                  <input type="text" class="form-control" id="time_service" name="time_service" placeholder="Enter Service Details" value="<?php echo e($setting[10]['value']); ?>">
                </div>
             
          </div>
        
         
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content --><?php /**PATH /var/www/html/cms-content/resources/views/admin/Setting/generalsetting.blade.php ENDPATH**/ ?>