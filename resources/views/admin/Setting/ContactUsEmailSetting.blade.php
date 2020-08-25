    <!-- Main content -->
    <section class="content">
    

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Contact Us Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">{{$setting[27]['type_name']}}</small></label>
                  <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter Details" value="{{$setting[27]['value']}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Greeting Name</label>
                  <input type="text" class="form-control" id="contact_us_greeting" placeholder="Enter Details" name="contact_us_greeting" value="{{$setting[31]['value']}}">
                </div>

             
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Reply Email Address</label>
                  <input type="email" class="form-control" id="contact_reply_email" placeholder="Enter Details" name="contact_reply_email" value="{{$setting[28]['value']}}">
                </div>
              <!-- /.form-group -->
         


          <div class="form-group">
                   <label for="exampleInputEmail1">Signature Name</label>
                  <small>&nbsp;&nbsp;(This will shows in email, when any Job application recived)</small>
                  <input type="text" class="form-control" id="contact_us_signature" name="contact_us_signature" placeholder="Enter Details" value="{{$setting[29]['value']}}">
                </div>

             
          </div>
        
         
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->

      </div>
     
    </section>
    <!-- /.content -->