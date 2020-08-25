@extends('layouts.dashboard')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page: {{$pageDetails['title']}} - Content List
        
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('allpages')}}"><i class="fa fa-list"></i>&nbsp;All Page List</a></li>
        <li><a  href="{{ route('addcontent',['id'=>$id]) }}"><i class="fa fa-plus"></i> Add New Page Content</a></li>
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
                <table class="table no-margin" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th nowrap="nowrap">Page Link</th>
                    <th>Content</th>
                    <th>Order</th>
                    <th>Publish</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php dd($pageList->total());if($pageList->total()>0){ $count=1; 
                  foreach($pageList as $pageListItem){ ?>
                  <tr>
                   <td>{{$count++}}</td>
                   <td><?php //print_r($pageListItem);
                          if(count($pageListItem['PageContentImage'])>0){ 
                           
                        ?>
                      <?php $bannerPath = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_250PX_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_250PX_WIDTH').'/'.$pageListItem['PageContentImage'][0]['default_images'];?>
                      <!-- {{asset($bannerPath)}} -->
                      <img src="{{asset($bannerPath)}}" width="150px" height="150px" alt="{{$pageListItem['PageContentImage'][0]['image_alt']}}" title="{{$pageListItem['PageContentImage'][0]['image_title']}}" />
                   <?php } ?>
                   </td>
                     <td>{!! $pageListItem['title'] !!}</td>
                     <td>{{($pageListItem['content_name']!='')?$pageListItem['content_name']:'NA'}}</td>
                     <td><a href="{{env('APP_URL')}}/{{$pageListItem['url']}}" target="_blank">{{($pageListItem['page_link_id']!='')?$pageListItem['PageContentLink']['title']:'NA'}}</a></td>
                     <td>{!! $pageListItem['description'] !!}</td>
                     <td>{{$pageListItem['order_no']}}</td>
                     <td><?php if($pageListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                      <td>
                        <a href="{{route('editcontent',['id'=>$pageListItem['id']])}}"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                        
                        <a href="{{route('deletepagecontent',['id'=>$pageListItem['id']])}}"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  <?php  } $count++; }else{ ?>
                    <tr>
                      <td colspan="9">
                        <div class="alert alert-danger">
                          No Page Content Added
                        </div>
                        
                      </td>
                    </tr>
                  <?php } ?>
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
