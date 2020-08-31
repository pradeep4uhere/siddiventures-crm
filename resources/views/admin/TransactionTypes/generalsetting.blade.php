 
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Transaction Type Information</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach($setting as $item){ ?>
          <div class="row">

            <div class="col-md-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Transaction Mode</label>
                  <input type="text" class="form-control"  placeholder="Enter Transaction Mode Type" name="transaction_type_code[]" value="{{$item['transaction_type']}}">
                  <input type="hidden" class="form-control"  placeholder="Enter Transaction Mode Type" name="ids[]" value="{{$item['id']}}">
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Comission Type</label>
                  <select name="commission_type[]" class="form-control">
                    <option value="Flat" <?php if($item['commission_type']=='Flat'){ ?> selected="selected" <?php } ?>>Flat</option>
                    <option value="Percentage" <?php if($item['commission_type']=='Percentage'){ ?> selected="selected" <?php } ?>>Percentage</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="exampleInputEmail1">Value</label>
                  <input type="text" class="form-control" id="value_{{$item['id']}}" placeholder="Enter Value" name="value[]" value="{{$item['value']}}">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
        
         
        </div>
      <?php } ?>

      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->