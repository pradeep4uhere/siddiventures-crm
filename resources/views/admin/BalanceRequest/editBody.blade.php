


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
                  <select name="status" class="form-control" id="statusOptions" onchange="openAmount()">
                    <option value="Success">Success</option>
                    <option value="On Hold">On Hold</option>
                    <option value="Cancel">Cancel</option>
                    <option value="In Process">In Process</option>
                  </select>
                  
                </td>
                </tr>

              

              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>
  </div>



  <hr/>
<div class="form-group" id="amountdiv" style="display: none">


  <div class="col-sm-6 col-lg-6 col-md-6">

            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Push Balance To Wallet- {{$DsWalletBalance['User']['first_name']}}-{{$DsWalletBalance['User']['AgentCode']}}</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                <tr>
                  <td colspan="3">
                  <input type="number" name="amount" id="amount" required="required" class="form-control" placeholder="Enter Amount i.e 5000">
                </td>
                </tr>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          
  </div>


  </div>

<script type="text/javascript">
  function openAmount(e){
    var value = $("#statusOptions").val();
    if(value == 'Success'){
      $("#amountdiv").show();
    }else{
      $("#amountdiv").hide();
    }
   
  }
</script>
