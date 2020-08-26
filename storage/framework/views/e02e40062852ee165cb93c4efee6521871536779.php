    <section class="content-header"><?php //dd($Job);?>
      <span><b>All Recived Application</b></span>
      <span class="pull-right btn btn-warning">
        <a href="<?php echo e(env('APP_URL')); ?>/public/storage/uploads/index.php?id=<?php echo e($jobDetails['id']); ?>&name=<?php echo e($jobDetails['job_title']); ?>" style="color: #FFF; margin-bottom:10px;">
          <i class="fa fa-download"> </i>&nbsp;Download All CVs
        </a>
      </span>
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
               <table id="example2" class="table table-bordered table-hover" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>When Start</th>
                    <th>Applied Date</th>
                    <th>Status</th>
                    <th>Resume</th>
                    <th>Preview</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($List->total()>0){ $count=1;
                  foreach($List as $ListItem){ ?>
                  <tr <?php if($ListItem['parent_id']==0){ ?> style="background-color: #FFF;" <?php } ?>>
                   <td><?php echo e($count); ?></td>
                   <td><?php echo e($ListItem['first_name']); ?>&nbsp;<?php echo e($ListItem['last_name']); ?></td>
                   <td><?php echo e($ListItem['email_address']); ?></td>
                   <td><?php echo e($ListItem['mobile']); ?></td>
                   <td><?php echo e($ListItem['when_start']); ?></td>
                   <td><?php echo e(GeneralHelper::getDateFormate($ListItem['created_at'])); ?></td>
               
                   <td style="width: 160px;">
                     <?php if($ListItem['application_status']=='Selected'){ ?>
                     <span class="badge bg-green"><?php echo e($ListItem['application_status']); ?></span>
                     <?php }else if($ListItem['application_status']=='Rejected'){ ?>
                     <span class="badge bg-red"><?php echo e($ListItem['application_status']); ?></span>
                     <?php }else if($ListItem['application_status']=='In Process'){ ?>
                     <span class="badge bg-yellow"><?php echo e($ListItem['application_status']); ?></span>
                     <?php }else{ ?>
                      <span class="badge bg-light-blue"><?php echo e($ListItem['application_status']); ?></span>
                     <?php } ?>
                    
                   </td>
                       <td><?php if($ListItem['resume']!=''){ ?>
                   
                    <a href="<?php echo e(config('global.JOB_RESUME')); ?>/<?php echo e($ListItem['resume']); ?>" target="_blank" title="Download Resume" class="btn btn-danger"><i class="fa fa-download"> </i>&nbsp;Download</a>
                  <?php } ?>
                  </td>
                    <td nowrap="nowrap" style="width: 150px;">

                         <a  target="_blank" title="Reply"  class="editModelBox btn btn-warning pull-right"  data-candidate="<?php echo e($ListItem['first_name']); ?>"  href="<?php echo e(route('replymessageonapplication',['id'=>$ListItem['id']])); ?>">&nbsp;Reply</a>
                       <a  target="_blank" title="View Resume" id="modelBox" class="editModelBox btn btn-info pull-right" data-toggle="modal" data-candidate="<?php echo e($ListItem['first_name']); ?>" data-target="#modal-default" data-href="<?php echo e(config('global.JOB_RESUME')); ?>/<?php echo e($ListItem['resume']); ?>" style="margin-right:5px;">&nbsp;View</a>
                    </td>
                  </tr>
                 
                  <?php $count++; }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         <!--    <div class="box-footer clearfix">
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

     </section>
<?php /**PATH /var/www/html/cms-content/resources/views/admin/Job/AllAppliedApplicationList.blade.php ENDPATH**/ ?>