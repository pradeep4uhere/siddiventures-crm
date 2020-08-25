  <div class="content-wrapper">
    <section class="content-header">
      <b>All List Applied By Users - {{$Job['Job']['job_title']}}
      </b>
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
               
                <table class="table no-margin" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>When Start</th>
                    <th>Applied Date</th>
                    <th>Resume</th>
                    <th style="width: 50px;">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td>{{$count}}</td>
                   <td>{{$ListItem['first_name']}}&nbsp;{{$ListItem['last_name']}}</td>
                   <td>{{$ListItem['email_address']}}</td>
                   <td>{{$ListItem['mobile']}}</td>
                   <td>{{$ListItem['when_start']}}</td>
                   <td>{{date("d M,Y",strtotime($ListItem['created_at']))}}</td>
                   <td><?php if($ListItem['resume']!=''){ ?>
                    <a href="{{config('global.JOB_RESUME')}}/{{$ListItem['resume']}}" target="_blank" title="Download Resume"><i class="fa fa-download"> </i>&nbsp;Download</a>
                  <?php } ?>
                  </td>
                   <td style="width: 100px;">
                    {{$ListItem['application_status']}}
                   </td>
                   <!--  <td>
                      <a href="{{route('editapplication',['id'=>$ListItem['id']])}}" title="Edit Job Application"><b><i class="fa fa-pencil"></i></b></a>&nbsp;&nbsp;
                      <a href="{{route('viewapplication',['id'=>$ListItem['id']])}}" title="View Job Application"><b><i class="fa fa-eye"></i></b></a>
                      
                    </td> -->
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
              {{$List->links()}}
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     </section>
   </div>