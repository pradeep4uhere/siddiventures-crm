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
        All Job List
      </h1>
      <ol class="breadcrumb">
        <li><a  href="<?php echo e(route('createjob')); ?>"><i class="fa fa-plus"></i>&nbsp;Add New Job</a></li>
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
                    <th>JOB Position</th>
                    <th>JOB ID</th>
                    <th>Skill</th>
                    <th>Job Publish Date</th>
                    <th>All Applications</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td><?php echo e($count); ?></td>
                   <td><a href="<?php echo e(route('viewjob',['id'=>$ListItem['id']])); ?>" title="View <?php echo e($ListItem['job_title']); ?> Job Details"><?php echo e($ListItem['job_title']); ?></a></td>
                   <td><?php echo e($ListItem['job_id']); ?></td>
                   <td>
                    <?php if(!empty($ListItem['JobSkill'])){ ?>
                      <?php foreach($ListItem['JobSkill'] as $JobSkillItem){  ?>
                          <span class="label label-primary"><?php echo e($JobSkillItem['Skill']['title']); ?></span>
                      <?php } ?>
                    <?php } ?>
                  </td>
                   <td><?php echo e(GeneralHelper::getDateFormate($ListItem['job_publish_date'])); ?></td>
                   <td align="center"><a href="<?php echo e(route('viewjob',['id'=>$ListItem['id'],'target'=>'application'])); ?>" title="
                    View All application List"><?php echo e(count($ListItem['JobApplication'])); ?></a></td>
                   <td><?php if($ListItem->job_status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                    <td>
                      <a href="<?php echo e(route('editjob',['id'=>$ListItem['id']])); ?>" title="Edit <?php echo e($ListItem['job_title']); ?> Job">
                        <i class="fa fa-pencil"></i>
                      </a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo e(route('deletejob',['id'=>$ListItem['id']])); ?>" title="Delete <?php echo e($ListItem['job_title']); ?> Job" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>
                      </a>&nbsp;&nbsp;
                      <a href="<?php echo e(route('viewjob',['id'=>$ListItem['id']])); ?>" title="View <?php echo e($ListItem['job_title']); ?> Job Details">
                        <i class="fa fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                  <?php $count++; }} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
         
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/List.blade.php ENDPATH**/ ?>