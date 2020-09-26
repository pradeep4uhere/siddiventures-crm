@extends('layouts.addpage')
@section('content')
<style type="text/css">
  .modal-content{
    width: 1100px !important;
    left: 0px;
    margin: auto;
    margin-left: -250px;
  }
</style>
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
      <h1>Edit RO - {{$user['first_name']}}
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('allrolist') }}">All RO List</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

       <p>
        @if(Session::has('error'))
        <p class="alert alert-danger"><small>
        @foreach(Session::get('error') as $err)
        <b>Error:</b> {{ $err }}</br>
        @endforeach
        </small>
        </p>
        @endif

      </p>
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
                <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter RO Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('editro',['id'=>$user['id']])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
             

               
               @include('admin.User.DS.editBody')
               
               

              
              
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
                <button type="button" class="btn btn-danger pull-right Cancel" style="margin-right: 10px">Cancel</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- /.box -->
         
        </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
                      <!-- /.box -->
           

          </div>
         
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

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>{{$user['title']}}-</b>&nbsp;Update <span  id="contentTitle"></span> Content</h4>
              </div>
              <div class="modal-body" style="padding:0px; ">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- <div class="control-sidebar-bg"></div> -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- ./wrapper -->
<script>
$(document).ready(function(){
    $('#modelBox').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

<script>
$(document).ready(function(){
    $('.editModelBox').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var loader  = "{{config('global.LOADER')}}";
        var img = "<img src='"+loader+"'>";
        $('.modal-body').html(img);
        $('.modal-body').load(dataURL,function(){
            var titleStr = "<b>"+$("#content_name").val()+"</b>";
            $("#contentTitle").html(titleStr);
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

<script type="text/javascript"> 
$(document).ready(function(){
  var menuId = "<?php echo $menuId; ?>";
  var selmenuId = "<?php echo ""; ?>";
  
getAjaxCall(menuId,selmenuId);
});


function getAjaxCallSingle(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}/public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
  });
}


function getAjaxCall(id,selmenuId){
  var selmenuId = "<?php echo ''; ?>";
  //alert(id);
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}public/index.php/getsubmenuedit/"+id+"/"+selmenuId,       
        success:function(res){
          $('#sub_category_id').html(res);
          setTimeout(function(){
            //alert(selmenuId);
            $('#menu_id').val(selmenuId);
          },2000);        }
    });
};
</script>
@endsection
