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
      <form action="{{route('editusercommission',['id'=>$user['id']])}}" method="POST">
      @csrf

     
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Transaction Commission Information Of -{{$user['AgentCode']}}</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach($transactionTypesList as $item){ ?>
          <div class="row">

            <div class="col-md-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Transaction Mode</label>
                  <input type="text" class="form-control"  placeholder="Enter Transaction Mode Type" name="transaction_type_code[]" value="{{$item['transaction_type']}}" readonly="readonly">
                  <input type="hidden" class="form-control"  placeholder="Enter Transaction Mode Type" name="ids[]" value="{{$item['id']}}">
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Comission Type</label>
                  <select name="commission_type[]" class="form-control" disabled="disabled">
                    <option value="Flat" <?php if($item['commission_type']=='Flat'){ ?> selected="selected" <?php } ?>>Flat</option>
                    <option value="Percentage" <?php if($item['commission_type']=='Percentage'){ ?> selected="selected" <?php } ?>>Percentage</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Value</label>
                  <input type="text" class="form-control" id="value_{{$item['id']}}" placeholder="Enter Value" name="value[]" value="{{GeneralHelper::getCommissionValue($agentCommission,$item['id'])}}">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
        
         
        </div>
      <?php } ?>

      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->

    

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
