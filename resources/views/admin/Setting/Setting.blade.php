@extends('layouts.addpage')
@section('content')

<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Update General Setting
      </h1>
      
    </section>
    <section   style="margin:15px; margin-bottom:0px; font-size: 15px;">
    <div class="row">
      <div class="col-md-12">
        @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      </div>
      @endif 
    </div> 
    </section>
      <form action="{{route('savesetting')}}" method="POST">
      @csrf

    @include('admin.Setting.generalsetting')


    @include('admin.Setting.socialsetting')
    

    @include('admin.Setting.contactsetting')


    @include('admin.Setting.adresssetting')

    @include('admin.Setting.ContactUsEmailSetting')

    

      <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
                 <button type="button" class="btn btn-danger pull-right Cancel" style="margin-right: 10px">Cancel</button>

        </div>
   
 </form>
  </div>
  <!-- /.content-wrapper -->

 

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
@endsection
