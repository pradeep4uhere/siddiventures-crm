  <div class="content-wrapper">
    <section class="content-header">
      <b>All List Applied By Users - <?php echo e($Job['Job']['job_title']); ?>

      </b>
    </section>
    <section class="content">
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
               
                <table class="table no-margin" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>When Start</th>
                    <th>Applied Date</th>
                    <th>Resume</th>
                    <th style="width: 50px;">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?>style="background-color: #FFF;" <?php } ?>>
                   <td><?php echo e($count); ?></td>
                   <td><?php echo e($ListItem['first_name']); ?>&nbsp;<?php echo e($ListItem['last_name']); ?></td>
                   <td><?php echo e($ListItem['email_address']); ?></td>
                   <td><?php echo e($ListItem['mobile']); ?></td>
                   <td><?php echo e($ListItem['when_start']); ?></td>
                   <td><?php echo e(date("d M,Y",strtotime($ListItem['created_at']))); ?></td>
                   <td><?php if($ListItem['resume']!=''){ ?>
                    <a href="<?php echo e(config('global.JOB_RESUME')); ?>/<?php echo e($ListItem['resume']); ?>" target="_blank" title="Download Resume"><i class="fa fa-download"> </i>&nbsp;Download</a>
                  <?php } ?>
                  </td>
                   <td style="width: 100px;">
                    <?php echo e($ListItem['application_status']); ?>

                   </td>
                   <!--  <td>
                      <a href="<?php echo e(route('editapplication',['id'=>$ListItem['id']])); ?>" title="Edit Job Application"><b><i class="fa fa-pencil"></i></b></a>&nbsp;&nbsp;
                      <a href="<?php echo e(route('viewapplication',['id'=>$ListItem['id']])); ?>" title="View Job Application"><b><i class="fa fa-eye"></i></b></a>
                      
                    </td> -->
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
              <?php echo e($List->links()); ?>

              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     </section>
   </div><?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/Jobapplication/AllAppliedApplicationList.blade.php ENDPATH**/ ?>