@extends('layouts.addpage')
@section('content')

<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Update Money Transfer Charge
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
      <form action="{{route('saveusermcommission')}}" method="POST">
      @csrf

   <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Money Transfer Charge- {{$user['first_name']}}-{{$user['AgentCode']}}</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <input type="hidden"  name="id" value="{{$id}}">
          <?php foreach($amountType as $key=>$item){  //dd($item);?>
          <div class="row">

            <div class="col-md-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Transaction Amount</label>
                  <input type="text" class="form-control"  placeholder="Enter Transaction Mode Type" name="transaction_type_code[]" value="{{$item['transaction_amount']}}" required="required" readonly="readonly">
                  <input type="hidden" class="form-control"  placeholder="Enter Transaction Mode Type" name="ids[]" value="{{$item['id']}}">

                </div>
            </div>
             <div class="col-md-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Comission Type</label>
                  <select name="commission_type[]" class="form-control" readonly="readonly" disabled="disabled">
                    <option value="Flat" <?php if($item['type']=='Flat'){ ?> selected="selected" <?php } ?>>Flat</option>
                    <option value="Percentage" <?php if($item['type']=='Percentage'){ ?> selected="selected" <?php } ?>>Percentage</option>
                  </select>
                </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Default Value</label>
                  <input type="text" class="form-control" id="value_{{$item['id']}}" placeholder="Enter Value" name="value[]" value="{{$item['bank_transfer_amount']}}" readonly="readonly">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
           <div class="col-md-2">
              <!-- /.form-group -->
              <?php if(!empty($MoneyTransferCharge)){ //dd($MoneyTransferCharge); 
                  $valueAmount = $MoneyTransferCharge[$key]['value']; 
                }else{ 
                   $valueAmount = $item['bank_transfer_amount'];  
                } ?>
              <div class="form-group">
                  <label for="exampleInputEmail1">User Value</label>
                  <input type="text" class="form-control" id="valueu_{{$item['id']}}" placeholder="Enter User Value" name="valueu[]" value="{{$valueAmount}}">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <?php if(!empty($MoneyTransferCharge)){?>
            <div class="col-md-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Status Type</label>
                  <select name="status[]" class="form-control">
                    <option value="1" <?php if($MoneyTransferCharge[$key]['status']=='1'){ ?> selected="selected" <?php } ?>>Active</option>
                    <option value="0" <?php if($MoneyTransferCharge[$key]['status']=='0'){ ?> selected="selected" <?php } ?>>InActive</option>
                  </select>
                </div>
            </div>
          <?php }else{ ?>
             <div class="col-md-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Status Type</label>
                  <select name="status[]" class="form-control">
                    <option value="1" <?php if($item['status']=='1'){ ?> selected="selected" <?php } ?>>Active</option>
                    <option value="0" <?php if($item['status']=='0'){ ?> selected="selected" <?php } ?>>InActive</option>
                  </select>
                </div>
            </div>
          <?php } ?>
         
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
