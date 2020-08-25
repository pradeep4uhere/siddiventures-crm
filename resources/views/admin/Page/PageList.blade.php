@extends('layouts.dashboard')
@section('content')
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Page List
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('createpage') }}"><i class="fa fa-plus"></i> Create New Page</a></li>
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
                <table id="example2" class="table table-bordered table-hover" style="font-size: 12px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Page Title</th>
                    <!-- <th>Page Slug</th> -->
                    <th>Page URL</th>
                    <th>Page Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($pageList->total()>0){ $count=1;
                  foreach($pageList as $pageListItem){ ?>
                  <tr>
                   <td>{{$count}}</td>
                   <td>
                        {{$pageListItem['title']}} 
                  </td>
                   <!-- <td>{{$pageListItem['title']}}</td> -->
                   <td><a href="{{env('FRONT_URL')}}{{$pageListItem['page_url']}}" target="_blank">{{env('FRONT_URL')}}{{$pageListItem['page_url']}}</a></td>
                   <td><?php if($pageListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                    <td >
                      <a href="{{route('editpage',['id'=>$pageListItem['id']])}}" title="Edit {{$pageListItem['title']}} Page Details"><i class="fa fa-pencil"></i>&nbsp;</a>&nbsp;&nbsp;
                      <!-- <a href="{{route('contentlist',['id'=>$pageListItem['id']])}}" title="All Page Content List"><i class="fa fa-list"></i>&nbsp;</a>&nbsp;&nbsp; -->
                      <a href="{{route('deletepage',['id'=>$pageListItem['id']])}}" title="Delete {{$pageListItem['title']}} Page" onclick="return confirm('Are you sure you want to delete page?')"><i class="fa fa-trash"></i>&nbsp;</a><!-- 
                      &nbsp;|&nbsp;
                      <a href="{{route('copypage',['id'=>$pageListItem['id']])}}" title="Make Duplicate Page"><i class="fa fa-file"></i>&nbsp;</a> -->
                    </td>
                  </tr>
                <?php $count++;}} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
              {{$pageList->links()}}
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

 

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->
@endsection
