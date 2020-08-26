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
      <h1>Push Balance To DS - {{$DsWalletBalance['User']['first_name']}}-{{$DsWalletBalance['User']['AgentCode']}}
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('alldsbalancerequest') }}">All Balance Request List</a></li>
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
            <form class="form-horizontal" action="{{route('requestprocess',['id'=>$DsWalletBalance['id']])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
             

               @include('admin.BalanceRequest.editBody')
               

              
              
              <!-- /.box-body -->
              <div class="box-footer">
               
                <input type="hidden" name="id" value="{{$DsWalletBalance['id']}}"/>
                <button type="button" class="btn btn-danger Cancel">Cancel</button>
                 <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to transfer amount?')">Submit For Transfer</button>
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
@endsection
