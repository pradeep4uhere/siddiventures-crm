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
        All Skills List
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('addskill') }}"><i class="fa fa-plus"></i>&nbsp;Add New Skill</a></li>
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
                    <th>Skill Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td>{{$count}}</td>
                   <td>{{$ListItem['title']}}</td>
                   <td><?php if($ListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                    <td>
                      <a href="{{route('editskill',['id'=>$ListItem['id']])}}" title="Edit {{$ListItem['title']}} Skill">
                        <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{route('deleteskill',['id'=>$ListItem['id']])}}" onclick="return confirm('Are you sure you want to delete?')" title="Delete {{$ListItem['title']}} Skill"><i class="fa fa-trash"></i></a>
                    </td>
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

     
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->
@endsection
