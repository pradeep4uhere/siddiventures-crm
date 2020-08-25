@extends('layouts.addpage')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Page Content - {{$Page['title']}}
        <small><a  href="{{ route('allpages')}}">All Page List</a></small>
       
      </h1>
      <ol class="breadcrumb">
        <?php $pageid = $Page['page']['id'];?>
        <li><a  href="{{ route('contentlist',['id'=>$pageid]) }}">Back To {{$Page['page']['title']}}</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
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
                <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Page Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('editcontent',['id'=>$id])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Name</label>
                    <input type="text" class="form-control" id="content_name" placeholder="Enter Page Content Name" name="content_name" value="{{$Page['content_name']}}">
                    <small><i>This Name is Only for Reference, not visible on frontend</i></small>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Tite</label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" value="{{$Page['title']}}">
                  </div>
                </div>
               
                 <div class="form-group">
                  

                  <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">External Content URL</label>
                    <input type="text" class="form-control" id="url" placeholder="Enter Page Content URl" name="url" value="{{$Page['url']}}">
                  </div>
                    <div class="col-sm-12 col-md-6">
                    <label for="inputEmail3" class="control-label">Page Link</label>
                    <select class="form-control" name="page_link_id">
                      <option value="0">--Choose Page--</option>
                      <?php foreach($pageList as $pageItem){  ?>
                          <option value="{{$pageItem['id']}}" <?php if($Page['page_link_id']==$pageItem['id']){ ?> selected="selected" <?php } ?>>{{$pageItem['title']}}</option>
                      <?php } ?>
                    </select>
                    
                  </div>
                </div>
                <?php if(count($Page['page_content_image'])>0){ ?>
                <?php foreach($Page['page_content_image'] as $pageImage){ ?>
                <?php $bannerPath = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_500PX_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_500PX_HEIGHT').'/'.$pageImage['default_images'];?>
                        <!-- {{asset($bannerPath)}} -->
                  
                   <div class="form-group">
                    
                    <div class="col-sm-12 col-md-12">
                       <label for="inputPassword" class="control-label">Image Preview [500X500]</label><br/>
                        <img src="{{asset($bannerPath)}}"  alt="{{$pageImage['image_alt']}}" title="{{$pageImage['image_title']}}" />
                    </div>
                    <div class="col-sm-12 col-md-12">
                       <label for="inputPassword" class="control-label">Image Preview[1920X800]</label><br/>
                         <?php $bannernewPath = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$pageImage['default_images'];?>
                        <img src="{{asset($bannernewPath)}}"  alt="{{$pageImage['image_alt']}}" title="{{$pageImage['image_title']}}" />
                    </div>
                    </div>

                  <div class="form-group">
                  <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class=" control-label">Image ALT Text</label>
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]" value="{{$pageImage['image_alt']}}">
                  </div>
                    <div class="col-sm-10 col-md-6">
                    <label for="inputPassword3" class="control-label">Image Title Text</label>
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]" value="{{$pageImage['image_title']}}">
                  </div>
                </div>
                <div class="form-group">
                
                </div>
                <div class="form-group ">
                  <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10 pull-right">
                    <a href="{{route('deletecontentimage',['id'=>$pageImage['id']])}}" class="btn btn-danger pull-right">Remove Image</a>
                  </div>
                </div>

                  <?php }} ?>
                   
                <div class="form-group">
                    <div class="col-sm-12 col-md-4">
                      <label for="inputPassword" class="control-label">Image Upload</label>
                        <input  type="file" class="form-control1" id="logo"  name="logo[]">
                    </div>

                      <div class="col-sm-12 col-md-4">
                    <label for="inputPassword3" class="control-label">Image ALT Text</label>
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]">
                  </div>

                   <div class="col-sm-12 col-md-4">
                    <label for="inputPassword3" class="control-label">Image Title Text</label>
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]">
                  </div>

                    </div>
               
               
                <div id="addmoreDiv"></div>
                <div class="form-group ">
                  <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10 pull-right">
                    <a href="javascript:void(0)" class="btn btn-warning pull-right" id="addMore">Add More Image</a>
                  </div>
                </div>
                 <div class="form-group">
                  
                  <div class="col-sm-12 col-md-12">
                     <!-- Main content -->
                    <label for="inputPassword3" class="control-label">Page Body</label>
                    <textarea id="editor1" name="body" rows="10" cols="80" placeholder="Enter Page Secription">
                      {{$Page['description']}}
                    </textarea>
                  </div>
                </div>

                <div class="form-group">
                

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-1</label>
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1" value="{{$Page['field_1']}}">
                </div>

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class=" control-label">More Field-2</label>
                  <input type="text" class="form-control" id="field_2" placeholder="Enter Text " name="field_2" value="{{$Page['field_2']}}">
                </div>
              </div>
             
              <div class="form-group">
               

                <div class="col-sm-12 col-md-6">
                   <label for="inputEmail3" class=" control-label">More Field-3</label>
                  <input type="text" class="form-control" id="field_3" placeholder="Enter Text " name="field_3" value="{{$Page['field_3']}}">
                </div>

                 <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-4</label>
                  <input type="text" class="form-control" id="field_4" placeholder="Enter Text " name="field_4" value="{{$Page['field_4']}}">
                </div>

              </div>
             
              <div class="form-group">
                

                <div class="col-sm-12 col-md-6">
                  <label for="inputEmail3" class="control-label">More Field-5</label>
                  <input type="text" class="form-control" id="field_5" placeholder="Enter Text " name="field_5" value="{{$Page['field_5']}}">
                </div>
              </div>



                 <div class="form-group">
                  
                  <div class="col-sm-12 col-md-6">
                    <label for="inputPassword3" class="control-label">Content Order</label>
                    <select class="form-control" name="order_no">
                    <?php for($i=1;$i<50;$i++){ ?>
                      <option value="{{$i}}" <?php if($Page['order_no']==$i){ echo "selected='selected'"; } ?>>{{$i}}</option>
                    <?php } ?>
                    </select>
                </div>

                                  <div class="col-sm-12 col-md-6">

                     <label for="inputPassword3" class="control-label">Page Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                </div>


              </div>

             

              
               
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
                <button type="submit" class="btn btn-danger pull-right Cancel" style="margin-right:10px; ">Cancel</button>
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
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#addMore').on('click',function(){
    //alert(88);
    var banner = "<div class='form-group'><div class='col-sm-12 col-md-4'><label for='inputPassword' class='control-label'>Banner</label><input  type='file' class='form-control1'  name='logo[]'></div>";
    var imageAlt = "<div class='col-sm-12 col-md-4'><label for='inputPassword3' class='control-label'>Image ALT Text</label><input type='text' class='form-control' id='image_alt' placeholder='Enter Image Alt Text' name='image_alt[]'></div>";
    var imageTitle="<div class='col-md-4'><label for='inputPassword3' class='control-label'>Image Title Text</label><input type='text' class='form-control' id='image_title' placeholder='Enter Image Title Text' name='image_title[]'></div></div>";
    $("#addmoreDiv").append(banner+imageAlt+imageTitle);
  });
});
</script>
@endsection
