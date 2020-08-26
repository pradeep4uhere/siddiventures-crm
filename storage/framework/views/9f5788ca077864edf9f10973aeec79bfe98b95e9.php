<?php $__env->startSection('content'); ?><!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Contact List
      </h1>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Reply</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr>
                   <td><?php echo e($count); ?></td>
                   <td><?php echo e($ListItem['full_name']); ?></td>
                   <td><?php echo e($ListItem['email_address']); ?></td>
                   <td><?php echo e($ListItem['mobile']); ?></td>
                   <td><?php echo e($ListItem['message']); ?></td>
                   <td><?php echo e(date("d M, Y",strtotime($ListItem['created_at']))); ?></td>
                   <td>
                    <?php if($ListItem->is_reply==1){  
                      echo "<font color='green'><b>Yes</b></font>"; }else{ 
                      echo "<font color='red'><b>No</b></font>";
                    } ?>
                      
                    </td>
                    <td>
                      <a href="<?php echo e(route('replymessage',['id'=>$ListItem['id']])); ?>" title="Reply on this message">
                        <i class="fa fa-share"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo e(route('deletemessage',['id'=>$ListItem['id']])); ?>" title="Delete Message" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           <!--  <div class="box-footer clearfix">
              <div class="pull-right">
              <?php echo e($List->links()); ?>

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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Contactus/List.blade.php ENDPATH**/ ?>