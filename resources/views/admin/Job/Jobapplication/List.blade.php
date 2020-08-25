@extends('layouts.dashboard')
@section('content')<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Job Application List
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
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
               
                <table id="example2" class="table table-bordered table-hover" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>JOB Position</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>When Start</th>
                    <th>Applied Date</th>
                    <th>Resume</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td>{{$count}}</td>
                   <td>
                    <?php //if(isset('Job', $ListItem)){ echo "hello"; ?>
                      {{$ListItem['Job']['job_title']}}
                    <?php //} ?>
                   </td>
                   <td>{{$ListItem['first_name']}}&nbsp;{{$ListItem['last_name']}}</td>
                   <td>{{$ListItem['email_address']}}</td>
                   <td>{{$ListItem['mobile']}}</td>
                   <td>{{$ListItem['when_start']}}</td>
                   <td>{{GeneralHelper::getDateFormate($ListItem['created_at'])}}</td>
                   <td><?php if($ListItem['resume']!=''){ ?>
                    <a href="{{config('global.JOB_RESUME')}}/{{$ListItem['resume']}}" target="_blank" title="Download Resume"><i class="fa fa-download"> </i>&nbsp;Download</a>
                  <?php } ?>
                  </td>
                   <td style="width: 100px;">
                    {{$ListItem['application_status']}}
                   </td>
                    <td>
                      <a href="{{route('editapplication',['id'=>$ListItem['id']])}}" title="Edit Job Application"><b><i class="fa fa-pencil"></i></b></a>&nbsp;&nbsp;
                      <a href="{{route('viewapplication',['id'=>$ListItem['id']])}}" title="View Job Application"><b><i class="fa fa-eye"></i></b></a>
                      
                    </td>
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           <!--  <div class="box-footer clearfix">
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

     
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->
@endsection
