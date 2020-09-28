
<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">First Name</label>
    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="{{$user['first_name']}}" required="required">
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Last Name</label>
    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="{{$user['last_name']}}" required="required">
     <input type="hidden" class="form-control" id="id"  name="id" value="{{$user['id']}}" required="required">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">Mobile</label>
    <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="mobile" value="{{$user['mobile']}}" required="required">
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Email Address</label>
    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$user['email']}}" required="required">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">Agent Code</label>
    <input type="text" class="form-control" id="AgentCode" placeholder="Enter Agent Code" name="AgentCode" value="{{$user['AgentCode']}}" required="required">
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Role ID</label>
    <select class="form-control" name="role_id">
      <option value="2">Distributor[DS]</option>
      <option value="3">Retailer[RO]</option>
    </select>
  </div>
</div>
  <div class="form-group">
     <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">Monthly Limit</label>
    <input type="text" class="form-control" id="per_mobile_monthly_limit" placeholder="Enter Monthly Limit" name="per_mobile_monthly_limit" value="{{$user['per_mobile_monthly_limit']}}" required="required">
  </div>
    <div class="col-sm-10 col-md-6">
      <label for="inputPassword3" class="control-label">Status</label>
      <select class="form-control" name="status">
        <option value="1" <?php if($user['status']==1){ ?> selected="selected" <?php } ?> >Active</option>
        <option value="0" <?php if($user['status']==0){ ?> selected="selected" <?php } ?>>InActive</option>
      </select>
  </div>
</div>
<br/>
<h4 style="padding: 0px; margin: 0px;"><a href="#">User Details</a></h4>
<hr/>
<div class="form-group">
  <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class=" control-label">DOB</label>
    <input type="text" class="form-control" id="date_of_birth" placeholder="dd/mm/yyyy" name="date_of_birth" value="{{$user['UserDetail']['date_of_birth']}}" required="required">
  </div>

  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Address-1</label>
    <input type="text" class="form-control" id="address_line_1" placeholder="Enter Address-1" name="address_line_1" value="{{$user['UserDetail']['address_line_1']}}" required="required">
  </div>

    <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class=" control-label">Address-2</label>
    <input type="text" class="form-control" id="address_line_2" placeholder="Enter address line 2" name="address_line_2" value="{{$user['UserDetail']['address_line_2']}}">
  </div>
</div>




<div class="form-group">
  <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class=" control-label">District</label>
    <input type="text" class="form-control" id="district" placeholder="Enter district" name="district" value="{{$user['UserDetail']['district']}}">
  </div>



  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">State</label>
     <select name="state_id" class="form-control">
      {!!GeneralHelper::getStateOptionListName($user['state_id'])!!}
      </select>
    
  </div>

  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">City</label>
    <select name="city_id" class="form-control">
    {!!GeneralHelper::getCityOptionListName($user['state_id'],$user['city_id'])!!}
    </select>
  </div> 
  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Pincode</label>
    <input type="text" class="form-control" id="pincode" placeholder="Enter pincode" name="pincode" value="{{$user['UserDetail']['pincode']}}" required="required">
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class=" control-label">Company Type</label>
     <select name="company_type" class="form-control">
      {!!GeneralHelper::getCompanyOptionsTypeList($user['company_type'])!!}
      </select>
  </div>

  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Company Name</label>
    <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name" value="{{$user['UserDetail']['company_name']}}" required="required">
  </div>
  <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class=" control-label">Service By</label>
     <select name="service_by" class="form-control">
      {!!GeneralHelper::getServiceTypeOptionList($user['UserDetail']['service_by'])!!}
      </select>

  </div>

  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Zone</label>
     <select name="zone" class="form-control">
      {!!GeneralHelper::getZoneTypeOptionList()!!}
      </select>
  </div> 
  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Identification Type</label>
      <select name="identification_type" class="form-control">
      {!!GeneralHelper::getIdentificationTypeOptionList($user['UserDetail']['identification_type'])!!}
      </select>

   
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6 col-lg-4 col-md-4">
    <label for="inputEmail3" class="control-label">IS Name On PAN CARD</label>
    <select name="is_name_on_pan_card" class="form-control">
      <option value="{{$user['UserDetail']['is_name_on_pan_card']}}">Yes</option>
      
    </select>
  
  </div>

  <div class="col-sm-6 col-md-4 col-lg-4">
    <label for="inputPassword3" class="control-label" name="slug">Pan Card Number</label>
    <input type="text" class="form-control" id="pan_card_number" placeholder="Enter pan card number" name="pan_card_number" value="{{$user['UserDetail']['pan_card_number']}}">
  </div> 


  
 
</div>

<div class="form-group">
  <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">ID Proof Document</label>
    <select name="id_proof_type_id" class="form-control">
      {!!GeneralHelper::getDocumentTypeOptionsList($user['UserDetail']['id_proof_type_id'])!!}
    </select>
  </div>
  <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">&nbsp;</label><br/>
    <i class="fa fa-download"></i>&nbsp;<a href="{{env('DOCUMENT_URL')}}/{{$user['UserDetail']['id_proof_document']}}" target="_blank">Download</a>
  </div>

</div>
<div class="form-group">
<div class="col-sm-12 col-lg-12 col-md-12">
  <?php 
        $fileArr = explode('.', $user['UserDetail']['id_proof_document']); 
        $fileExtension = end($fileArr);
        $fileExtensionArr = array('jpg','jpeg','png','gif');
        if(in_array($fileExtension,$fileExtensionArr)){
          $imgStr = env('DOCUMENT_URL')."/".$user['UserDetail']['id_proof_document'];
          echo "<img src='".$imgStr."' width='500px'/>";
        }
  ?>
</div>
</div>
<hr/>

<div class="form-group">
  <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">Address Proof Type Id</label>
     <select name="address_proof_type_id" class="form-control">
      {!!GeneralHelper::getDocumentTypeOptionsList($user['UserDetail']['address_proof_type_id'])!!}
    </select>
   
  </div>
      <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">&nbsp;</label><br/>
    <i class="fa fa-download"></i>&nbsp;<a href="{{env('DOCUMENT_URL')}}/{{$user['UserDetail']['address_proof']}}" target="_blank">Download</a>
  </div>
</div>
<div class="form-group">
<div class="col-sm-12 col-lg-12 col-md-12">
  <?php 
        $fileArr = explode('.', $user['UserDetail']['address_proof']); 
        $fileExtension = end($fileArr);
        $fileExtensionArr = array('jpg','jpeg','png','gif');
        if(in_array($fileExtension,$fileExtensionArr)){
          $imgStr = env('DOCUMENT_URL')."/".$user['UserDetail']['address_proof'];
          echo "<img src='".$imgStr."' width='500px'/>";
        }
  ?>
</div>
</div>
<hr/>


<div class="form-group">
  <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">Business Proof Type Id</label>
    <select name="business_proof_type_id" class="form-control">
      {!!GeneralHelper::getDocumentTypeOptionsList($user['UserDetail']['business_proof_type_id'])!!}
    </select>
    
  </div>
    <div class="col-sm-6 col-lg-3 col-md-3">
    <label for="inputEmail3" class="control-label">&nbsp;</label><br/>
    <i class="fa fa-download"></i>&nbsp;<a href="{{env('DOCUMENT_URL')}}/{{$user['UserDetail']['business_proof']}}" target="_blank">Download</a>
  </div>
</div>
<div class="form-group">
<div class="col-sm-12 col-lg-12 col-md-12">
  <?php 
        $fileArr = explode('.', $user['UserDetail']['business_proof']); 
        $fileExtension = end($fileArr);
        $fileExtensionArr = array('jpg','jpeg','png','gif');
        if(in_array($fileExtension,$fileExtensionArr)){
          $imgStr = env('DOCUMENT_URL')."/".$user['UserDetail']['business_proof'];
          echo "<img src='".$imgStr."' width='500px'/>";
        }
  ?>
</div>
</div>

