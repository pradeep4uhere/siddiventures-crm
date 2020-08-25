@extends('layouts.addpage')
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
  <h1>Add New Page</h1>
  <ol class="breadcrumb">
    <li><a  href="{{ route('allpages') }}"><i class="fa fa-list"></i>&nbsp;All Page List</a></li>
  </ol>
</section>
   <form class="form-horizontal" action="{{route('createpage')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- Main content -->
    @include('admin.Page.addpageForm')

    @include("admin.Page.pagebanner")
  

    @include("admin.Page.metatags")


    <section class="content">
    
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
        url:"{{env('APP_URL')}}/public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>
@endsection
