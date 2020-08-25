 
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Contact Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" id="admin_email" placeholder="Enter Email Address" name="admin_email" value="{{$setting[3]['value']}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Office Number</label>
                  <input type="text" class="form-control" id="office_number" placeholder="Enter Office Number" name="office_number" value="{{$setting[21]['value']}}">
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Contact Person Name</label>
                  <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Enter Contact Persona Name" value="{{$setting[22]['value']}}">
                </div>


            <div class="form-group">
                  <label for="exampleInputEmail1">Contact Mobile</label>
                  <input type="text" class="form-control" id="contact_mobile" name="contact_mobile" placeholder="Contact Mobile Number" value="{{$setting[23]['value']}}">
                </div>
             
          </div>
        
         
        </div>
      </div>
      <!-- /.box -->

      </div>

    </section>
    <!-- /.content -->