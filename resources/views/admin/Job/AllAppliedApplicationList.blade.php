    <section class="content-header"><?php //dd($Job);?>
      <span><b>All Recived Application</b></span>
      <span class="pull-right btn btn-warning">
        <a href="{{env('APP_URL')}}/public/storage/uploads/index.php?id={{$jobDetails['id']}}&name={{$jobDetails['job_title']}}" style="color: #FFF; margin-bottom:10px;">
          <i class="fa fa-download"> </i>&nbsp;Download All CVs
        </a>
      </span>
    </section>
    <section class="content">
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
               <table id="example2" class="table table-bordered table-hover" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>When Start</th>
                    <th>Applied Date</th>
                    <th>Status</th>
                    <th>Resume</th>
                    <th>Preview</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?> style="background-color: #FFF;" <?php } ?>>
                   <td>{{$count}}</td>
                   <td>{{$ListItem['first_name']}}&nbsp;{{$ListItem['last_name']}}</td>
                   <td>{{$ListItem['email_address']}}</td>
                   <td>{{$ListItem['mobile']}}</td>
                   <td>{{$ListItem['when_start']}}</td>
                   <td>{{GeneralHelper::getDateFormate($ListItem['created_at'])}}</td>
               
                   <td style="width: 160px;">
                     <?php if($ListItem['application_status']=='Selected'){ ?>
                     <span class="badge bg-green">{{$ListItem['application_status']}}</span>
                     <?php }else if($ListItem['application_status']=='Rejected'){ ?>
                     <span class="badge bg-red">{{$ListItem['application_status']}}</span>
                     <?php }else if($ListItem['application_status']=='In Process'){ ?>
                     <span class="badge bg-yellow">{{$ListItem['application_status']}}</span>
                     <?php }else{ ?>
                      <span class="badge bg-light-blue">{{$ListItem['application_status']}}</span>
                     <?php } ?>
                    
                   </td>
                       <td><?php if($ListItem['resume']!=''){ ?>
                   
                    <a href="{{config('global.JOB_RESUME')}}/{{$ListItem['resume']}}" target="_blank" title="Download Resume" class="btn btn-danger"><i class="fa fa-download"> </i>&nbsp;Download</a>
                  <?php } ?>
                  </td>
                    <td nowrap="nowrap" style="width: 150px;">

                         <a  target="_blank" title="Reply"  class="editModelBox btn btn-warning pull-right"  data-candidate="{{$ListItem['first_name']}}"  href="{{route('replymessageonapplication',['id'=>$ListItem['id']])}}">&nbsp;Reply</a>
                       <a  target="_blank" title="View Resume" id="modelBox" class="editModelBox btn btn-info pull-right" data-toggle="modal" data-candidate="{{$ListItem['first_name']}}" data-target="#modal-default" data-href="{{config('global.JOB_RESUME')}}/{{$ListItem['resume']}}" style="margin-right:5px;">&nbsp;View</a>
                    </td>
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         <!--    <div class="box-footer clearfix">
              <div class="pull-right">
              {{$List->links()}}
              </div>
            </div> -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     </section>
