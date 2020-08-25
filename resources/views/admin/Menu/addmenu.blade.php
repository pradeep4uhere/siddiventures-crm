@extends('layouts.addpage')
@section('content')
<?php  

//$parameters = $request = request();  dd($parameters);?>
<!-- Left side column. contains the logo and sidebar -->
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Menu</h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('allmenumanage') }}">All Menu List</a></li>
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
        <div class="col-md-8">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Menu Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('addmenu')}}" method="post" >
              {{csrf_field()}}
              <div class="box-body">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Parent Menu</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="parent_id">
                      <option value="0">Choose Parent Menu</option>
                      <?php foreach($menu as $item){ ?>
                      <?php if($item['parent_id']==0){ ?>
                       <optgroup label="{{$item['title']}}">  
                      <?php } ?>  
                      <option value="{{$item['id']}}" <?php if($id==$item['id']){ ?> selected="selected" <?php } ?>>{{$item['title']}}</option>
\                      <?php if($item['parent_id']==0){ ?>
                      </optgroup>
                      <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
               

              <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Menu Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" placeholder="Enter menu title" name="title">
                </div>
              </div>
         
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Position</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="order_no">
                       <?php for($i=1;$i<=10;$i++){ ?>
                          <option value="{{$i}}">{{$i}}</option>
                      <?php } ?>

                    </select>
                </div>
              </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
                <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px">Cancel</button>

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
<script type="text/javascript">
  
function getAjaxCall(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}/public/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>
@endsection
