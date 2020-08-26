<?php $__env->startSection('content'); ?>
<style type="text/css">
  .mendetetory{
    font-size: 12px;
    font-weight: bold;
    color:red;
  }
</style>
<style type="text/css">
  .modal-content{
    width: 1100px !important;
    left: 0px;
    margin: auto;
    margin-left: -250px;
  }
</style>
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
  <h1>View <?php echo e($jobDetails['job_title']); ?> Job</h1>
  <ol class="breadcrumb">
    <li><a  href="<?php echo e(route('alljobs')); ?>"><i class="fa fa-list"></i>&nbsp;All Job List</a></li>
  </ol>
</section>
      <!-- Main content -->
   <section class="content">
      <?php if($message = Session::get('message')): ?>
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
              <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <td nowrap="nowrap"><b>Job Position:</b></td>
                  <td nowrap="nowrap"> <?php echo e($jobDetails['job_title']); ?></td>
                  <td>
                    <b>Job ID:</b>
                  </td>
                  <td><?php echo e($jobDetails['job_id']); ?></td>
                </tr>
                <tr>
                  <td><b>Tag Line:</b></td>
                  <td> <?php echo e($jobDetails['tagline']); ?></td>
                  <td nowrap="nowrap">
                    <b>Required Skills:</b>
                  </td>
                  <td nowrap="nowrap">
                     <?php //dd($jobDetails['job_skill']); 
                          if(!empty($jobDetails['job_skill'])){ ?>
                          <?php foreach($jobDetails['job_skill'] as $item){ 
                            echo $item['skill']['title'].",&nbsp;&nbsp;";
                            }  } 
                    ?>
                  </td>
                </tr>

                <tr>
                  <td colspan="4"><b>Details:</b></td>
                </tr>
                 <tr>
                  <td colspan="4"> <?php echo $jobDetails['job_descriptions']; ?></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><b>External Url:</b></td>
                  <td> <?php echo e($jobDetails['external_url']); ?></td>
                  <td nowrap="nowrap">
                    <b>Job Published:</b>
                  </td nowrap="nowrap">
                  <td><?php echo e(GeneralHelper::getDateFormate($jobDetails['job_publish_date'])); ?></td>
                </tr>

                  <tr>
                  <td><b>Job Status:</b></td>
                  <td> 
                      <?php if($jobDetails['job_status']==1){ ?> 
                      <span class="badge bg-green">Active</span>
                      <?php } ?>
                      <?php if($jobDetails['job_status']==0){ ?> 
                      <span class="badge bg-red">InActive</span>
                      <?php } ?>
                    </td>
                  <td>
                    &nbsp;
                  </td>
                  <td>&nbsp;</td>
                </tr>

               
              </tbody>
            </table>
            </div>




            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
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
    </div>
    </section>
    <!-- /.content -->   
    <div id="alljobapplicationList">
    <?php echo $__env->make('admin.Job.AllAppliedApplicationList',array('List'=>$List,'Job'=>$jobDetails), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  

  </div>
</section>
</div>
<div class="control-sidebar-bg"></div>
  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Resume Preview-<span id="nameOfCandidate"></span></b></h4>
          </div>
          <div class="modal-body" style="padding:0px; "></div>
        </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  <div class="modal fade" id="modal-default1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Reply-<span id="nameOfCandidate"></span></b></h4>
          </div>
          <div class="modal-body" style="padding:0px; "></div>
        </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- ./wrapper -->
<script type="text/javascript">

function getAjaxCall(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"<?php echo e(env('APP_URL')); ?>public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.addjob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/view.blade.php ENDPATH**/ ?>