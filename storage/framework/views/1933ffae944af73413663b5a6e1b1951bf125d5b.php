 
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Social Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Facebook</label>
                  <input type="text" class="form-control" id="fb_link" placeholder="Enter facebook name" name="fb_link" value="<?php echo e($setting[4]['value']); ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">You Tube</label>
                  <input type="text" class="form-control" id="youtube_link" placeholder="Enter You Tube Page Url" name="youtube_link" value="<?php echo e($setting[8]['value']); ?>">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Linkedin</label>
                  <input type="text" class="form-control" id="ln_link" name="ln_link" placeholder="Enter Linkedin Profile Url" value="<?php echo e($setting[5]['value']); ?>">
                </div>


            <div class="form-group">
                  <label for="exampleInputEmail1">Twitter</label>
                  <input type="text" class="form-control" id="tw_link" name="tw_link" placeholder="Enter Twittter Profile Url" value="<?php echo e($setting[6]['value']); ?>">
                </div>
             
          </div>
        
         
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->
    </div>

      

    </section>
    <!-- /.content --><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Setting/socialsetting.blade.php ENDPATH**/ ?>