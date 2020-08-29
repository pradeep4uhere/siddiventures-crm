    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Job Apply Contact Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo e($setting[20]['type_name']); ?></small></label>
                  <input type="email" class="form-control" id="job_application_email" name="job_application_email" placeholder="Enter Details" value="<?php echo e($setting[20]['value']); ?>">
                </div>

 <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo e($setting[25]['type_name']); ?></label>
                  <input type="email" class="form-control" id="job_application_reply" placeholder="Enter Details" name="job_application_reply" value="<?php echo e($setting[25]['value']); ?>">
                </div>
             
            </div>
            <!-- /.col -->
            <div class="col-md-6">
               
              <!-- /.form-group -->
         


          <div class="form-group">
                   <label for="exampleInputEmail1"><?php echo e($setting[26]['type_name']); ?></label>
                  <small>&nbsp;&nbsp;(This will shows in email, when any Job application recived)</small>
                  <input type="text" class="form-control" id="job_application_sign" name="job_application_sign" placeholder="Enter Details" value="<?php echo e($setting[26]['value']); ?>">
                </div>

             
          </div>
        
         
        </div>
      </div>
      <!-- /.box -->

      </div>
    </section>
    <!-- /.content --><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Setting/extrasetting.blade.php ENDPATH**/ ?>