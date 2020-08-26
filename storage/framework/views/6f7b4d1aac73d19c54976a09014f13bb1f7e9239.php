 
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Address Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Address Line-1</label>
                  <input type="text" class="form-control" id="address_number_1" placeholder="Enter  Address Line 1" name="address_number_1" value="<?php echo e($setting[14]['value']); ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  <input type="text" class="form-control" id="address_state" placeholder="Enter State" name="address_state" value="<?php echo e($setting[15]['value']); ?>">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Address Line 2</label>
                  <input type="text" class="form-control" id="address_number_2" name="address_number_2" placeholder="Enter Contact Persona Name" value="<?php echo e($setting[18]['value']); ?>">
                </div>


            <div class="form-group">
                  <label for="exampleInputEmail1">Address City</label>
                  <input type="text" class="form-control" id="address_city" name="address_city" placeholder="Enter City" value="<?php echo e($setting[24]['value']); ?>">
                </div>
             
          </div>
        
         
        </div>
      </div>
      <!-- /.box -->

      </div>

    </section>
    <!-- /.content --><?php /**PATH /var/www/html/cms-content/resources/views/admin/Setting/adresssetting.blade.php ENDPATH**/ ?>