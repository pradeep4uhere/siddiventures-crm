
<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">Distributor</label>
    <select name="parent_user_id" class="form-control">
      <option value="">-Choose DS-</option>
      <?php foreach($DSList as $item){ ?>
        <option value="{{$item['id']}}" <?php if($item['id']==$user['parent_user_id']){ ?> selected="selected" <?php } ?>>{{$item['name']}}-{{$item['AgentCode']}}</option>
      <?php } ?>
    </select>
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Last Name</label>
    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="{{$user['last_name']}}" required="required">
    <input type="hidden" class="form-control" id="id"  name="id" value="{{$user['id']}}" required="required">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-6 col-lg-6 col-md-6">
    <label for="inputEmail3" class=" control-label">First Name</label>
    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="{{$user['first_name']}}" required="required">
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <label for="inputPassword3" class="control-label" name="slug">Last Name</label>
    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="{{$user['last_name']}}" required="required">
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
      <option value="3" selected="selected">Retailer[RO]</option>
      <option value="2">Distributor[DS]</option>
    </select>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-10 col-md-6">
      <label for="inputPassword3" class="control-label">Status</label>
      <select class="form-control" name="status">
        <option value="1" <?php if($user['status']==1){ ?> selected
selected="selected" <?php } ?> >Active</option>
        <option value="0" <?php if($user['status']==0){ ?> selected
selected="selected" <?php } ?>>InActive</option>
      </select>
  </div>
</div>
