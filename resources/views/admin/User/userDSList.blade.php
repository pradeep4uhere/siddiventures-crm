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
        All Distributor List
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Mobile</th>
                    <th>Monthly Limit</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($userDSList->total()>0){ $count=1;
                  foreach($userDSList as $pageListItem){ ?>
                  <tr>
                   <td>{{$count}}</td>
                   <td>{{$pageListItem['first_name']}}&nbsp;{{$pageListItem['last_name']}}</td>
                   <td>{{$pageListItem['email']}}&nbsp;</td>
                   <td>{{$pageListItem['password_text']}}&nbsp;</td>
                   <td>{{$pageListItem['mobile']}}&nbsp;</td>
                   <td>{{GeneralHelper::getAmount($pageListItem['per_mobile_monthly_limit'])}}&nbsp;</td>
                   <td><?php if($pageListItem['PaymentWallet']!=null){ ?>{{GeneralHelper::getAmount($pageListItem['PaymentWallet']['total_balance'])}}
                    <?php }else{
                      echo GeneralHelper::getAmount('0.00');
                    } ?>
                   </td>
                   <td>
                    <?php if($pageListItem->status==1){  
                            echo "<font color='green'><b>Active</b></font>"; 
                          }else{ 
                            echo "<font color='red'><b>Inactive</b></font>";
                          } 
                    ?>
                   </td>
                    <td>{{GeneralHelper::getDateFormate($pageListItem['created_at'])}}</td>
                  
                    <td >
                      <a href="{{route('editds',['id'=>$pageListItem['id']])}}" title="Edit {{$pageListItem['first_name']}} Details"><i class="fa fa-pencil"></i>&nbsp;</a>&nbsp;&nbsp;
                      <a href="#" title="All Recharge Transaction"><i class="fa fa-inr"></i>&nbsp;</a>&nbsp;&nbsp;
                      <a href="#" title="View Wallet Transaction"><i class="fa fa-bar-chart"></i>&nbsp;</a>
                      <a href="#" title="View Retailer List" ><i class="fa fa-users"></i>&nbsp;</a>
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
