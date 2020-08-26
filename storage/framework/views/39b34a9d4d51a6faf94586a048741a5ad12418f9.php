<?php $__env->startSection('content'); ?>
<style type="text/css">
  .modal-content{
    width: 1100px !important;
    left: 0px;
    margin: auto;
    margin-left: -250px;
  }
</style>
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
      <h1>Edit Page - <?php echo e($page['title']); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a  href="<?php echo e(route('allpages')); ?>">All Page List</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
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
                <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Page Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo e(route('editpage',['id'=>$page['id']])); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
             

               <?php echo $__env->make('admin.Page.editPageBody', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             
               <?php echo $__env->make('admin.Page.editPageBanner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               
               <?php echo $__env->make('admin.Page.editPageMetaTags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               

              
                <div class="form-group">
                  

                  <div class="col-sm-10 col-md-6">
                    <label for="inputPassword3" class="control-label">Page Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if($page['status']==1){ ?> selected
selected="selected" <?php } ?> >Active</option>
                      <option value="0" <?php if($page['status']==0){ ?> selected
selected="selected" <?php } ?>>InActive</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
                <button type="button" class="btn btn-danger pull-right Cancel" style="margin-right: 10px">Cancel</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- /.box -->
         
        </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
                      <!-- /.box -->
           <button type="button" id="modelBox" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default" data-href="<?php echo e(env('APP_URL')); ?>/public/index.php/addcontent/<?php echo e($page['id']); ?>" >
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Page Content
              </button>

          </div>
         
          <!-- /.box -->
        </div>
        <?php echo $__env->make("admin.Page.PageContent.PageContentListTemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    

        <!-- /.col -->
      </div>

     
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><?php echo e($page['title']); ?>-</b>&nbsp;Update <span  id="contentTitle"></span> Content</h4>
              </div>
              <div class="modal-body" style="padding:0px; ">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- <div class="control-sidebar-bg"></div> -->
<script src="<?php echo e(config('global.BACKENDCMS')); ?>/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- ./wrapper -->
<script>
$(document).ready(function(){
    $('#modelBox').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

<script>
$(document).ready(function(){
    $('.editModelBox').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var loader  = "<?php echo e(config('global.LOADER')); ?>";
        var img = "<img src='"+loader+"'>";
        $('.modal-body').html(img);
        $('.modal-body').load(dataURL,function(){
            var titleStr = "<b>"+$("#content_name").val()+"</b>";
            $("#contentTitle").html(titleStr);
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

<script type="text/javascript"> 
$(document).ready(function(){
  var menuId = "<?php echo $menuId; ?>";
  var selmenuId = "<?php echo $selected_menu_id; ?>";
  
getAjaxCall(menuId,selmenuId);
});


function getAjaxCallSingle(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"<?php echo e(env('APP_URL')); ?>/public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
  });
}


function getAjaxCall(id,selmenuId){
  var selmenuId = "<?php echo $selected_menu_id; ?>";
  //alert(id);
    var postJson = "";
    $.ajax({
        type:'get',
        url:"<?php echo e(env('APP_URL')); ?>public/index.php/getsubmenuedit/"+id+"/"+selmenuId,       
        success:function(res){
          $('#sub_category_id').html(res);
          setTimeout(function(){
            //alert(selmenuId);
            $('#menu_id').val(selmenuId);
          },2000);        }
    });
};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.addpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms-content/resources/views/admin/Page/editPage.blade.php ENDPATH**/ ?>