  <section class="content">
      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
      </div>
      <?php endif; ?>
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
        <div class="col-md-10">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Job Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
              <div class="box-body">
                 <div class="form-group col-md-6">
                  <div class="col-sm-12 ">
                    <label for="inputEmail3" class="control-label">Job Tite</label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Job Title" name="title" required="required">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="col-sm-12">
                    <label for="inputPassword3" class=" control-label" name="slug"> JOB ID</label>
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Job ID" name="jobid" required="required">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="col-sm-12 col-md-12">
                  <label for="inputPassword3" class=" control-label" name="slug"> External Url</label>
                    <input type="text" class="form-control" id="tagline" placeholder="Enter External Url" name="url" >
                  </div>
                </div>
             
         
                 <div class="form-group col-md-6">
                  <div class="col-sm-12 col-md-12">
                  <label for="inputPassword3" class=" control-label" name="slug"> Tag Line</label>
                    <input type="text" class="form-control" id="tagline" placeholder="Enter Tage line" name="tagline" >
                  </div>
                </div>
                  <div class="form-group col-md-12">
                    <div class="col-md-12">

                    <label>Add Skills [Multiple]</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Choose Skills"
                            style="width: 100%;" name="skills[]" >
                      <?php if(!empty($skills)){ ?>
                      <?php foreach($skills as $item){ ?>
                        <option value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
             
                 <div class="form-group col-md-12">

                  <div class="col-sm-12">
                  <label for="inputPassword3" class="control-label">Job Descriptions</label><br/>
                  <div>
                     <!-- Main content -->
                    <textarea id="editor1" name="body" rows="10" cols="60" class="jqte-test" placeholder="Enter  Job Description Goes Here">
                     
                    </textarea>
                  </div>
                  </div>
                </div>
              
                <div class="form-group col-md-6">
                  <div class="col-sm-12">
                  <label for="inputPassword3" class="control-label">Job Published</label>
                    <input type="date" name="job_publiish_date" class="form-control datepicker">
                </div>
              </div>
           
               <div class="form-group col-md-6">
                  <div class="col-sm-12">
                  <label for="inputPassword3" class="control-label">Job Status</label>
                    <select class="form-control" name="job_status">
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
    <!-- /.content -->   <?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/addForm.blade.php ENDPATH**/ ?>