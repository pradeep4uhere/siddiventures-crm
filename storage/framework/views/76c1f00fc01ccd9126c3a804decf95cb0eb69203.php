<?php $__env->startSection('content'); ?><!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Menu List
      </h1>
      <ol class="breadcrumb">
        <li><a  href="<?php echo e(route('addmenu')); ?>"><i class="fa fa-plus"></i>&nbsp;Create New Menu</a></li>
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
               
                <table id="example2" class="table table-bordered table-hover" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Parent Menu</th>
                    <th>Menu Status</th>
                    <th>Position</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($menuList->total()>0){ $count=1;
                  foreach($menuList as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td><?php echo e($count); ?></td>
                   <td><?php echo e($ListItem['title']); ?></td>
                   <td><?php if($ListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                   <td><?php echo e($ListItem['order_no']); ?></td>
                    <td>
                      <a href="<?php echo e(route('editmenu',['id'=>$ListItem['id']])); ?>" title="Edit <?php echo e($ListItem['title']); ?> Menu">
                        <i class="fa fa-pencil"></i>
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo e(route('deletemenu',['id'=>$ListItem['id']])); ?>" title="Delete <?php echo e($ListItem['title']); ?> Menu" onclick="return confirm('Are you sure you want to delete?')">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          <!--   <div class="box-footer clearfix">
              <div class="pull-right">
              <?php echo e($menuList->links()); ?>

              </div>
            </div> -->
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

<!-- ./wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures.admin/resources/views/admin/Menu/MenuListManage.blade.php ENDPATH**/ ?>