
    <section class="content" style="margin-bottom:15px;margin-top:15px;">
     
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <p class="box-title">DS-RO Commission</p>
        </div>
        <!-- /.box-header -->
            
            <div class="box-body">
              <div class="table-responsive">
               
                <table class="table no-margin" style="font-size: 14px;">
                 
                  <?php  $count=1; ?>
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th nowrap="nowrap">Name</th>
                    <th nowrap="nowrap">Role Type</th>
                    <?php foreach($transactionTypesList as $item){ ?>
                      <th nowrap="nowrap">{{$item['transaction_type']}}</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($userList)){ ?>
                  <?php foreach($userList as $ListItem){ //dd($ListItem);?>
                  <tr>
                   <td>{{$count}}</td>
                   <td>{{$ListItem['name']}}-{{$ListItem['AgentCode']}}</td>
                   <td>
                    <?php if($ListItem->role_id==2){ echo "DS";} ?>
                    <?php if($ListItem->role_id==3){ echo "RO";} ?>
                   </td>
                   <?php
                         foreach($agetCommission[$ListItem['id']] as $itemACut){  
                         if(!empty($itemACut)){ //dd($itemACut);
                         ?>
                      <td>
                        {{$itemACut['commission']}}
                        <?php if($itemACut['TransactionType']['commission_type']=='Percentage'){ echo "%";}?>
                        
                      </td>
                     <?php }else{ ?>
                        <td>0.00</td>
                     <?php } ?>
                   
                   <?php } ?>
                   <td><?php if($ListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?>
                     
                   </td>
                    <td>
                      <a href="{{route('editusercommission',['id'=>$ListItem['id']])}}"><b>Edit</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                      <a href="{{route('deletusercommission',['id'=>$ListItem['id']])}}"><b>Delete</b></a>
                    </td>
                  </tr>
                  <?php $count++;} ?>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
      <!-- /.box -->
    </section>
