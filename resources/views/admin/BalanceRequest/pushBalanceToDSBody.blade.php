


<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>DS Name</th>
                  <th>:</th>
                  <th>{{$DsWalletBalance['User']['first_name']}}&nbsp;{{$DsWalletBalance['User']['last_name']}}-{{$DsWalletBalance['User']['AgentCode']}}</th>
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
                  <th colspan="3">Amount Transfred To Company Wallet
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


  

 
</div>


<?php if($DsWalletBalance['is_transfer_into_company_wallet']==1){  ?>
<div id="amountdiv" style="display:block">
<div class="form-group" >
  <div class="col-sm-6 col-lg-6 col-md-6">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th colspan="3">Push Balance To DS-{{$DsWalletBalance['User']['AgentCode']}}</th>
                  
                </tr>
                <tr>
                  <td style="width: 50%">Available Balance</td>
                  <td>:</td>
                  <td>{{GeneralHelper::getAmount(GeneralHelper::getWalletBalance())}}</td> 
                </tr>
              
                 <tr>
                  <td colspan="3">
                  <input type="number" name="amount" id="amount" required="required" class="form-control" placeholder="Enter Amount i.e 5000">
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
    
       </div>
          <div class="form-group" >
              <div class="col-sm-12 col-lg-12 col-md-12">

        <div class="box-footer">
       
        <button type="button" class="btn btn-danger Cancel">Cancel</button>
        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to transfer amount?')">Submit For Transfer</button>
        </div>
        </div>
        </div>


<?php } ?>