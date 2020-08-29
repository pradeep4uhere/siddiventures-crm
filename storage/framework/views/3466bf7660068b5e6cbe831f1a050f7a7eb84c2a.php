<?php $__env->startSection('content'); ?>

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
        <?php if(Session::has('message')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('message')); ?></p>
      </div>
      </div>
      <?php endif; ?> 
    </div> 
    </section>
      <form action="<?php echo e(route('savesetting')); ?>" method="POST">
      <?php echo csrf_field(); ?>

    <?php echo $__env->make('admin.Setting.generalsetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('admin.Setting.socialsetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <?php echo $__env->make('admin.Setting.contactsetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('admin.Setting.adresssetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.Setting.ContactUsEmailSetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.addpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/debaleenacms/resources/views/admin/Setting/Setting.blade.php ENDPATH**/ ?>