<?php $__env->startSection('content'); ?>
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
      <?php if(Session::has('message')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('message')); ?></p>
      </div>
      <?php endif; ?>
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
                    <th>Mobile</th>
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
                   <td><?php echo e($count); ?></td>
                   <td><?php echo e($pageListItem['first_name']); ?>&nbsp;<?php echo e($pageListItem['last_name']); ?></td>
                   <td><?php echo e($pageListItem['email']); ?>&nbsp;</td>
                   <td><?php echo e($pageListItem['mobile']); ?>&nbsp;</td>
                   <td><?php if($pageListItem['PaymentWallet']!=null){ ?><?php echo e(GeneralHelper::getAmount($pageListItem['PaymentWallet']['total_balance'])); ?>

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
                    <td><?php echo e(GeneralHelper::getDateFormate($pageListItem['created_at'])); ?></td>
                  
                    <td >
                      <a href="<?php echo e(route('editpage',['id'=>$pageListItem['id']])); ?>" title="Edit <?php echo e($pageListItem['first_name']); ?> Details"><i class="fa fa-pencil"></i>&nbsp;</a>&nbsp;&nbsp;
                      <a href="<?php echo e(route('deletepage',['id'=>$pageListItem['id']])); ?>" title="All Wallet Transaction"><i class="fa fa-inr"></i>&nbsp;</a>&nbsp;&nbsp;
                      <a href="<?php echo e(route('deletepage',['id'=>$pageListItem['id']])); ?>" title="Delete <?php echo e($pageListItem['title']); ?> Page" onclick="return confirm('Are you sure you want to delete page?')"><i class="fa fa-trash"></i>&nbsp;</a>
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
              <?php echo e($userDSList->links()); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures.admin/resources/views/admin/User/userDSList.blade.php ENDPATH**/ ?>