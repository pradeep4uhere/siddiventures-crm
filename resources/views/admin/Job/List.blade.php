@extends('layouts.dashboard')
@section('content')<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Job List
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('createjob') }}"><i class="fa fa-plus"></i>&nbsp;Add New Job</a></li>
      </ol>
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
                    <th>JOB ID</th>
                    <th>Skill</th>
                    <th>Job Publish Date</th>
                    <th>All Applications</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td>{{$count}}</td>
                   <td><a href="{{route('viewjob',['id'=>$ListItem['id']])}}" title="View {{$ListItem['job_title']}} Job Details">{{$ListItem['job_title']}}</a></td>
                   <td>{{$ListItem['job_id']}}</td>
                   <td>
                    <?php if(!empty($ListItem['JobSkill'])){ ?>
                      <?php foreach($ListItem['JobSkill'] as $JobSkillItem){  ?>
                          <span class="label label-primary">{{$JobSkillItem['Skill']['title']}}</span>
                      <?php } ?>
                    <?php } ?>
                  </td>
                   <td>{{GeneralHelper::getDateFormate($ListItem['job_publish_date'])}}</td>
                   <td align="center"><a href="{{route('viewjob',['id'=>$ListItem['id'],'target'=>'application'])}}" title="
                    View All application List">{{count($ListItem['JobApplication'])}}</a></td>
                   <td><?php if($ListItem->job_status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                    <td>
                      <a href="{{route('editjob',['id'=>$ListItem['id']])}}" title="Edit {{$ListItem['job_title']}} Job">
                        <i class="fa fa-pencil"></i>
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{route('deletejob',['id'=>$ListItem['id']])}}" title="Delete {{$ListItem['job_title']}} Job" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>
                      </a>&nbsp;&nbsp;
                      <a href="{{route('viewjob',['id'=>$ListItem['id']])}}" title="View {{$ListItem['job_title']}} Job Details">
                        <i class="fa fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                  <?php $count++; }} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
         
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
