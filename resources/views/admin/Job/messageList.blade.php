<div class="col-md-12">
  <?php //dd($messsageList);?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true"><i class="fa fa-envelope"></i>&nbsp;All Message</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="timeline">
                @if(!empty($messsageList))
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <?php foreach($messsageList as $key=>$value){  ?>
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          {{$key}}
                        </span>
                  </li>
                  <?php if(!empty($value)){ ?>
                  <?php foreach($value as $item){ ?>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <?php if($item['message_to']=='ADMIN'){ ?>
                    <li>
                      <i class="fa fa-envelope bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i>  {{date("H:i A",strtotime($item['created_at']))}}</span>

                        <h3 class="timeline-header"><a href="#">{{ucwords($item['name'])}}</a> sent email</h3>

                        <div class="timeline-body">
                          {!!$item['message']!!}
                        </div>
<!--                         <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Read more</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
 -->                      </div>
                    </li>
                   <?php } ?>
                   <?php if($item['message_to']=='USER'){ ?>
                   <li>
                    <i class="fa fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{date("H:i A",strtotime($item['created_at']))}}</span>

                      <h3 class="timeline-header"><a href="#">{{ucwords($item['from_name'])}}</a></h3>

                      <div class="timeline-body">
                        {!!$item['message']!!}
                      </div>
                      <!-- <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div> -->
                    </div>
                  </li>
                  <?php } ?>
                  <?php  }}} ?>
                 
                  <!-- END timeline item -->
                  <!-- timeline item -->
                 
                  <!-- END timeline item -->



                  <!-- timeline item -->
                 <!--  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
                @else
                <ul class="timeline timeline-inverse">
                  <li>
                    <div class="alert  alert-danger">No Message Found</div>
                  </li>
                </ul>   
                @endif
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>