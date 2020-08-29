


<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>DS Name</th>
                  <th>:</th>
                  <th>{{$DsWalletBalance['User']['first_name']}}&nbsp;{{$DsWalletBalance['User']['last_name']}}</th>
                </tr>
                <tr>
                  <td>Requested Amount</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getAmount($DsWalletBalance['requested_amount'])}}</td>
                </tr>
                <tr>
                  <td>Payment Date</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getDateFormate($DsWalletBalance['payment_date'])}}</td>
                </tr>
              

                 <tr>
                  <td>Depositor</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['depositer_name']}}</td>
                </tr>
              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>


   <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Company Bank Name</th>
                  <th>:</th>
                  <th>{{GeneralHelper::getCompanyBankName($DsWalletBalance['company_bank_id'])}}</th>
                </tr>
                <tr>
                  <td>Bank Location</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['bank_location']}}</td>
                </tr>
                <tr>
                  <td>Bank Code</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['bank_branch_code']}}</td>
                </tr>
                <tr>
                  <td>Payment Mode</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getPaymentModeName($DsWalletBalance['payment_mode_type_id'])}}</td>
                </tr>

              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>



 
</div>
<hr/>
<div class="form-group" style="margin-top:15px !important;">
  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Sender Name</th>
                  <th>:</th>
                  <th>{{$DsWalletBalance['depositer_name']}}</th>
                </tr>
                <tr>
                  <td>Sender mobile number</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['sender_mobile_number']}}</td>
                </tr>
                <tr>
                  <td>Sender Account Number</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['sender_account_number']}}</td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>


   <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Bank Name</th>
                  <th>:</th>
                  <th>{{$DsWalletBalance['neft_via_bank_id']}}</th>
                </tr>
                <tr>
                  <td>NEFT/RTGS Transfer Date</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getDateFormate($DsWalletBalance['neft_transfer_date'])}}</td>
                </tr>
                <tr>
                  <td>Transaction Number</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['transaction_number']}}</td>
                </tr>
              

              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>



  

 
</div>


<hr/>
<div class="form-group" >

  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Remarks</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                <tr>
                  <td colspan="3">{{$DsWalletBalance['remarks']}}</td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>


   <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Staus</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                <tr>
                <td>
                  <select name="status" class="form-control" id="statusOptions" onchange="openAmount()" 
                  <?php if($DsWalletBalance['is_transfer_into_company_wallet']==1){  ?> disabled="disabled" <?php } ?>> 
                    <option value="Success" 
                    <?php if($DsWalletBalance['status']=='Success'){ ?> selected="selected" <?php } ?>>Success</option>
                    <option value="On Hold" <?php if($DsWalletBalance['status']=='On Hold'){ ?> selected="selected" <?php } ?>>On Hold</option>
                    <option value="Cancel" <?php if($DsWalletBalance['status']=='Cancel'){ ?> selected="selected" <?php } ?>>Cancel</option>
                    <option value="In Process" <?php if($DsWalletBalance['status']=='In Process'){ ?> selected="selected" <?php } ?>>In Process</option>
                  </select>
                  <input type="hidden" name="id" value="{{$DsWalletBalance['id']}}"/>
                </td>
                </tr>
              </tbody>
            </table>
            </div>
  </div>
  </div>





<?php if($DsWalletBalance['is_transfer_into_company_wallet']==1){  ?>
  <hr/>
<div class="form-group" >

   <div class="col-sm-12 col-lg-12 col-md-12">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th colspan="3">
                    <?php if($DsWalletBalance['is_transfer_into_company_wallet']==1){  ?>
                        <div class="alert alert-success">
                          <p><?php echo GeneralHelper::getAmount($DsWalletBalance['requested_amount']). " has beed credited to  company wallet." ?></p>
                        </div>
                    <?php } ?>
                  </th>
                </tr>
                <tr>
                  <td>Amount Credited</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getAmount($DsWalletBalance['requested_amount'])}}</td>
                </tr>
                <tr>
                  <td>Transaction Date</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['transfer_date_to_company']}}</td>
                </tr>
                <tr>
                  <td>Transaction No</td>
                  <td>:</td>
                  <td>{{$DsWalletBalance['transfer_transaction_no']}}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td>
                    <?php if($DsWalletBalance['is_transfer_into_company_wallet']==1){  
                      echo "<font color='green'><b>Success</b></font>"; 
                    }else{ 
                      echo "<font color='red'><b>In Process</b></font>";
                    } ?>

                  
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>
</div>
<?php } ?>

<?php if($DsWalletBalance['is_transfer_into_company_wallet']==0){  ?>
<div id="amountdiv" style="display: none">
<div class="form-group" >
  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th colspan="3">Push Balance To Company Wallet</th>
                  
                </tr>
                <tr>
                  <td style="width: 50%">Available Balance</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getWalletBalance()}}</td> 
                </tr>
              
                 <tr>
                  <td colspan="3">
                  <input type="number" name="amount" id="amount" required="required" class="form-control" placeholder="Enter Amount i.e 5000" value="{{$DsWalletBalance['requested_amount']}}" readonly="readonly">
                </td>
                </tr>
                <tr>
                  <td colspan="3">
                  <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Enter remarks" >
                </td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>

  <!-- /.box-body -->
  
       </div>
       <div class="form-group" >
        <div class="box-footer">
       
        <button type="button" class="btn btn-danger Cancel">Cancel</button>
        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to transfer amount into Company Wallet?')">Submit For Transfer</button>
        </div>
        </div>
       </div>

<div class="form-group" id="otherButton" >
<div class="box-footer">

<button type="button" class="btn btn-danger Cancel">Cancel</button>
<button type="submit" class="btn btn-info" >Submit</button>
</div>
</div>       

<script type="text/javascript">
  function openAmount(e){
    var value = $("#statusOptions").val();
    if(value == 'Success'){
      $("#amountdiv").show();
      $("#otherButton").hide();
    }else{
      $("#amountdiv").hide();
      $("#otherButton").show();
    }
   
  }
</script>
<?php } ?>