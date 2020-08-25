@extends('layouts.addpage')
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
      <h1>View Job Application -  {{$menu['Job']['job_title']}}
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('alljobsapplication') }}">All Application List</a></li>
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
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Job Application Details</h3>
            
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('editapplication',['id'=>$menu['id']])}}" method="post" >
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$menu['id']}}">
              <div class="box-body">
                   

              <div class="form-group">
                <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">First Name</label>
                  <input type="text" class="form-control" id="first_name"  name="first_name" value="{{$menu['first_name']}}">
                </div>
                  <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name"  name="last_name" value="{{$menu['last_name']}}">
                </div>
              </div>
         
              <div class="form-group">
                <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">Email Address</label>
                  <input type="text" class="form-control" id="email_address"  name="email_address" value="{{$menu['email_address']}}">
                </div>
                  <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">Mobile</label>
                  <input type="text" class="form-control" id="mobile"  name="mobile" value="{{$menu['mobile']}}">
                </div>
              </div>
         
            
               <div class="form-group">
                <div class="col-sm-12 col-md-12">
                  <label for="inputPassword3" class="control-label">Cover Letter</label>
                  <textarea class="form-control jqte-test" id="cover_letter"  name="cover_letter">
                    {{$menu['cover_letter']}}
                  </textarea>
                </div>
               
                 
              </div>
               
                 
                <div class="form-group">
                    <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">When Start</label>
                  <select name="when_start" class="form-control">
                    <?php foreach($whenstart as $list){ ?>
                      <option value="{{$list['id']}}" <?php if($menu['when_start']==$list['id']){ ?> selected="selected" <?php } ?>>{{$list['title']}}</option>
                    <?php } ?>
                  </select>
                </div>

                  <div class="col-sm-12 col-md-6">
                     <label for="inputPassword3" class="control-label">Job Application Status</label>
                    <select class="form-control" name="application_status">
                      <option value="New Application">New Application</option>
                      <option value="In Process">In Process</option>
                      <option value="On Hold">On Hold</option>
                      <option value="Selected">Selected</option>
                      <option value="Rejected">Rejected</option>
                    </select>
                </div>
              </div>

                <div class="form-group">
                    <div class="col-sm-12 col-md-6">
                  <label for="inputPassword3" class="control-label">Resume</label><br/>
                  <label>
                   <a href="{{config('global.JOB_RESUME')}}/pradeep_resume.doc" target="_blank"><i class="fa fa-download"> </i>&nbsp;Download</a>
                 </label>
                </div>

                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>&nbsp;
                <button type="button" class="btn btn-danger pull-right Cancel"  style="margin-right:5px; ">Cancel</button>
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
