  <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
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
                    <div class="form-group col-md-12">
                     <div class=" col-md-6">
                      <div class="">
                        <label for="inputEmail3" class="control-label">Job Title</label>
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Job Title" name="title" required="required" value="{{$jobDetails['job_title']}}">
                      </div>
                    </div>
                    <div class=" col-md-6">
                      <div class="">
                        <label for="inputPassword3" class=" control-label" name="slug"> JOB ID</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Job ID" name="jobid" required="required" value="{{$jobDetails['job_id']}}">
                      </div>
                    </div>

             
                      <div class="col-md-12">
                      <label for="inputPassword3" class=" control-label" name="slug"> Tag Line</label>
                        <input type="text" class="form-control" id="tagline" placeholder="Enter tage line" name="tagline"  value="{{$jobDetails['tagline']}}">
                      </div>
                    
                    </div>
                    
           
                      <div class="form-group col-md-12">
                        <div class="col-md-12">

                        <label>Choose Skill [Multiple]</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Choose Multiple Skill" style="width: 100%;" name="skills[]" >
                          <?php if(!empty($skills)){ ?>
                          <?php foreach($skills as $item){ ?>
                            <option value="{{$item['id']}}">{{$item['title']}}</option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                 
                     <div class="form-group col-md-12">

                      <div class="col-sm-12">
                      <label for="inputPassword3" class="control-label">JOB Descriptions</label><br/>
                      <div>
                         <!-- Main content -->
                        <textarea id="editor1" name="body" rows="10" cols="60">
                          {{$jobDetails['job_descriptions']}}
                        </textarea>
                      </div>
                      </div>
                    </div>
                      <div class="form-group col-md-12">
                    <div class="col-md-6">
                      <label for="inputPassword3" class=" control-label" name="slug"> External Url</label>
                        <input type="text" class="form-control" id="tagline" placeholder="Enter External Url" name="external_url"  value="{{$jobDetails['external_url']}}">
                      </div>
                  
                    <div class="col-md-6">
                      <div class="">
                      <label for="inputPassword3" class="control-label">Job Published</label>
                        <input type="date" name="job_publiish_date" class="form-control datepicker" value="{{$jobDetails['job_publish_date']}}">
                    </div>
                  </div>
               
                   <div class=" col-md-6">
                      <label for="inputPassword3" class="control-label">Job Status</label>
                        <select class="form-control" name="job_status">
                          <option value="1" <?php if($jobDetails['job_status']==1){ ?> selected="selected" <?php } ?>>Active</option>
                          <option value="0" <?php if($jobDetails['job_status']==0){ ?> selected="selected" <?php } ?>>InActive</option>
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
    <!-- /.content -->   