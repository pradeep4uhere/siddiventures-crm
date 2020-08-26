@extends('layouts.dashboard')
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
      <h4>
        All Distributor Balance Request List
      </h4>
      <ol class="breadcrumb">
        
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
                <table id="example2" class="table table-bordered table-hover" style="font-size: 12px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th nowrap="nowrap">Payment Date</th>
                    <th nowrap="nowrap">Payment Mode</th>
                    <th>Depositor</th>
                    <th>Bank</th>
                    <th>Bank Location</th>
                    <th>Bank Code</th>
                    <th>Sender Mobile</th>
                    <th>Sender A/C</th>
                    <th>NEFT Via</th>
                    <th>TXN Date</th>
                    <th>TXN No.</th>
                    <th>Remarks</th>
                   
                    <th>Created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($userDSList->total()>0){ $count=1;
                  foreach($userDSList as $pageListItem){ ?>
                 
                  <tr>
                   <td 
                  
                   >{{$count}}</td>
                   <td nowrap="nowrap"
                   <?php if($pageListItem['status']=='In Process'){ ?> class="alert alert-info" title="New Request" <?php } ?>
                   <?php if($pageListItem['status']=='Success'){ ?> title="Request Proccessed"  class="alert alert-success"<?php } ?>
                   <?php if($pageListItem['status']=='Cancel'){ ?> title="Request Cancel"  class="alert alert-danger"<?php } ?>
                   <?php if($pageListItem['status']=='On Hold'){ ?> title="Request On Hold" class="alert alert-warning"<?php } ?>
                   >{{$pageListItem['status']}}</td>
                   <td nowrap="nowrap">
                     <a href="{{route('requestprocess',['id'=>$pageListItem['id']])}}" title="Push Balance to {{$pageListItem['User']['first_name']}}-{{$pageListItem['User']['AgentCode']}} Wallet">
                      {{$pageListItem['User']['first_name']}}-{{$pageListItem['User']['AgentCode']}}
                   </a>
                   </td>
                   <td nowrap="nowrap">{{$pageListItem['User']['email']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['User']['mobile']}}</td>
                   <td nowrap="nowrap">{{GeneralHelper::getAmount($pageListItem['requested_amount'])}}</td>
                   <td nowrap="nowrap">{{GeneralHelper::getDateFormate($pageListItem['payment_date'])}}</td>
                   <td nowrap="nowrap">{{GeneralHelper::getPaymentModeName($pageListItem['payment_mode_type_id'])}}</td>
                   <td nowrap="nowrap">{{$pageListItem['depositer_name']}}</td>
                   <td nowrap="nowrap">{{GeneralHelper::getCompanyBankName($pageListItem['company_bank_id'])}}</td>
                   <td nowrap="nowrap">{{$pageListItem['bank_location']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['bank_branch_code']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['sender_mobile_number']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['sender_account_number']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['neft_via_bank_id']}}</td>
                   <td nowrap="nowrap">{{GeneralHelper::getDateFormate($pageListItem['neft_transfer_date'])}}</td>
                   <td nowrap="nowrap">{{$pageListItem['transaction_number']}}</td>
                   <td nowrap="nowrap">{{$pageListItem['remarks']}}</td>
                   
                   <td nowrap="nowrap">{{GeneralHelper::getDateFormate($pageListItem['created_at'])}}</td>
                   <td >
                      <a href="{{route('editds',['id'=>$pageListItem['id']])}}" title="Push Balance to {{$pageListItem['User']['first_name']}}-{{$pageListItem['User']['AgentCode']}} Wallet"><i class="fa fa-pencil"></i>&nbsp;</a>&nbsp;&nbsp;
                      
                      <a href="#" title="Reject Request {{$pageListItem['title']}} Page" onclick="return confirm('Are you sure you want to reject this request?')"><i class="fa fa-trash"></i>&nbsp;</a>
                    </td>
                  </tr>

                <?php $count++;}} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
              {{$userDSList->links()}}
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
