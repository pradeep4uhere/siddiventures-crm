<?php $__env->startSection('content'); ?>
<style type="text/css">
  .content{
    min-height: 0px;
  }
</style>
<style type="text/css">
  .breadcrumb{
    font-size: 18px !important;
  }
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Add New Page</h1>
  <ol class="breadcrumb">
    <li><a  href="<?php echo e(route('allpages')); ?>"><i class="fa fa-list"></i>&nbsp;All Page List</a></li>
  </ol>
</section>
   <form class="form-horizontal" action="<?php echo e(route('createpage')); ?>" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <!-- Main content -->
    <?php echo $__env->make('admin.Page.addpageForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("admin.Page.pagebanner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

    <?php echo $__env->make("admin.Page.metatags", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section class="content">
    
    </section>
  </form>
  </div>
</section>
</div>
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script type="text/javascript">
function getAjaxCall(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"<?php echo e(env('APP_URL')); ?>/public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.addpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms-content/resources/views/admin/Page/createPage.blade.php ENDPATH**/ ?>