<div class="col-md-12">
  <?php //dd($messsageList);?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true"><i class="fa fa-envelope"></i>&nbsp;All Message</a></li>
            </ul>

            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="container">
                <div class="row">
                <div class="col-md-11">
                <!--Accordian Ends Now-->
                @if(!empty($messsageList))
                <?php $count=1; foreach($messsageList as $key=>$value){  ?>
                <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title info">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$count}}" class="info">Message On {{$key}}</a>
                    </h4>
                  </div>
                  <div id="collapse{{$count}}" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?php if(!empty($value)){ ?>
                        <?php foreach($value as $item){ ?>
                        <?php if($item['message_to']=='USER'){ ?>
                        <div class="panel-group" id="accordion{{$item['id']}}">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion{{$item['id']}}" href="#collapse4{{$item['id']}}">
                                  {{ucwords($item['from_name'])}} </a>
                                </h4>
                                </div>
                                <div id="collapse4{{$item['id']}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {!!$item['message']!!}
                                    </div>

                                </div>
                            </div>
                        </div>
                      <?php } ?>
                      <?php if($item['message_to']=='ADMIN'){ ?>
                           <div class="panel-group" id="accordion{{$item['id']}}">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion{{$item['id']}}" href="#collapse4{{$item['id']}}">
                                  {{ucwords($item['name'])}} </a>
                                </h4>
                                </div>
                                <div id="collapse4{{$item['id']}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {!!$item['message']!!}
                                    <?php if($item['fileattachment']!=''){ ?>
                                    
                                    <p style="margin-top: 20px;">
                                      <a href="{{config('global.JOB_RESUME')}}/{{$item['fileattachment']}}" class="btn btn-danger"> <i class="fa fa-download"></i>&nbsp;Download Attached File</a></p>
                                  <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                      <?php $count++;} ?>
                      <?php } ?>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
               <?php } ?>
               @else
                <ul class="timeline timeline-inverse">
                  <li>
                    <div class="alert  alert-danger">No Message Found</div>
                  </li>
                </ul>   
                @endif
              <!--Accordian Ends Now-->
              </div>
                </div>
              </div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>