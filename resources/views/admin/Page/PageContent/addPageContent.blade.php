@extends('layouts.addpage')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Page Content - {{$Page['title']}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('contentlist',['id'=>$id]) }}">Back To {{$Page['title']}}</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
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
          <div class="box-header with-border">
              <h3 class="box-title">Enter Page Content Details</h3>
          </div>
          <!-- /.box-header -->
            <!-- /.box-header -->
            <div class="box-body">
                <!-- right column -->
        <div class="col-md-12">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('addcontent',['id'=>$id])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
              
                 <div class="form-group">
                  
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Name</label>
                    <input type="text" class="form-control" id="content_name" placeholder="Enter Page Content Name" name="content_name">
                    <small style="color:red"><i>This Name is Only for Reference, not visible on frontend</i></small>
                  </div>

                   <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Content Title</label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title">
                  </div>

                </div>
                 <div class="form-group">
                  

                 
                </div>
                 <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">External Content URL</label>
                    <input type="text" class="form-control" id="url" placeholder="Enter External Content URL" name="url">
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Link</label>
                    <select class="form-control" name="page_link_id">
                      <option value="0">--Choose Page--</option>
                      <?php foreach($pageList as $pageItem){  ?>
                          <option value="{{$pageItem['id']}}" >{{$pageItem['title']}}</option>
                      <?php } ?>
                    </select>
                    
                  </div>
                </div>
              
                 <div class="form-group">
                  <div class="col-sm-12">
                  <label for="inputPassword3" class="control-label">Page Content Body</label><br/>
                     <!-- Main content -->
                    <textarea id="editor1" name="body" rows="10" cols="80">
                      Page Body Goes Here
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                
                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-1</label>
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1">
                </div>
                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-2</label>
                  <input type="text" class="form-control" id="field_2" placeholder="Enter Text " name="field_2">
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-12 col-md-6">
                <label for="inputEmail3" class="control-label">More Field-3</label>
                <input type="text" class="form-control" id="field_3" placeholder="Enter Text " name="field_3">
              </div>

              <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-4</label>
                  <input type="text" class="form-control" id="field_4" placeholder="Enter Text " name="field_4">
                </div>

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-5</label>
                  <input type="text" class="form-control" id="field_5" placeholder="Enter Text " name="field_5">
                </div>

                 <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-6</label>
                  <input type="text" class="form-control" id="field_6" placeholder="Enter Text " name="field_6">
                </div>


              </div>
              
                <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                      <label for="inputPassword3" class="control-label">Content Order</label>
                      <select class="form-control" name="order_no">
                      <?php for($i=1;$i<20;$i++){ ?>
                        <option value="{{$i}}">{{$i}}</option>
                      <?php } ?>
                      </select>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label">Page Content Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                  </div>
                 
              </div>
              <div class="form-group">
                  
              </div>
              <div class="form-group">
                
            
      
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
                <button type="submit" class="btn btn-danger pull-right Cancel" style="margin-right:10px; ">Cancel</button>
              </div>
              <!-- /.box-footer -->

            @include('admin.Page.PageContent.pageContentImageTemplate')
            </form>
          <!-- /.box -->
         
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
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#addMore').on('click',function(){
    //alert(88);
    var banner = "<div class='form-group col-md-4'><label for='inputPassword' class=' control-label'>Banner</label><input  type='file' class='form-control1'  name='logo[]'></div>";
    var imageAlt = "<div class='form-group col-md-4'><label for='inputPassword3' class='control-label'>Image ALT Text</label> <input type='text' class='form-control' id='image_alt' placeholder='Enter Image Alt Text' name='image_alt[]'></div>";
    var imageTitle="<div class='form-group col-md-4'><label for='inputPassword3' class='control-label'>Image Title Text</label><input type='text' class='form-control' id='image_title' placeholder='Enter Image Title Text' name='image_title[]'></div>";
    $("#addmoreDiv").append(banner+imageAlt+imageTitle);
  });
});
</script>

@endsection
