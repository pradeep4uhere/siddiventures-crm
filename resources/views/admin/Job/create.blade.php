@extends('layouts.addjob')
@section('content')
<style type="text/css">
  .content{
    min-height: 0px;
  }
</style>
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Add New Job</h1>
  <ol class="breadcrumb">
    <li><a  href="{{ route('alljobs') }}"><i class="fa fa-list"></i>&nbsp;All Jobs List</a></li>
  </ol>
</section>
   <form class="form-horizontal" action="{{route('createjob')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- Main content -->
    @include('admin.Job.addForm')

    @include("admin.Job.pagebanner")
  


    <section class="content">
     <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Save</button>
          <button type="button" class="btn btn-danger pull-right Cancel" style="margin-right: 10px">Cancel</button>
    </div>
    </section>
  </form>
  </div>
</section>
</div>
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script type="text/javascript">
function getAjaxCall(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>
@endsection
