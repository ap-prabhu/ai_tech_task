  
  <h1>
    <?php if(isset($_GET['user_creation_id']) || $_GET['user_creation_id'] !=''){  echo "Update";} else {echo "Create";} ?> user_creation
  </h1>
      
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?file=user_creation/list"><i class="fa fa-home"></i>user_creation List</a></li>
      <li class="breadcrumb-item active"><?php if($_GET['user_creation_id'] !=''){  echo "Update";} else {echo "Create";} ?></li>
    </ol>

<script language="javascript" type="text/javascript" src="user_creation/user_creation.js"></script>
<?php 
  $name='';
  $email='';
  $mobile_no='';
  $gender='';
  $address='';
  $password='';
  if($_GET['user_creation_id'] !='')
  {
      $sql ="SELECT * FROM user_creation where user_creation_id=".$_GET['user_creation_id'];
      $pdo_statement = $pdo_conn->prepare($sql);
      $pdo_statement->execute();
      $updateresult = $pdo_statement->fetchAll();
      $user_creation_id=$updateresult[0]['user_creation_id'];
      $name=$updateresult[0]['name'];
      $email=$updateresult[0]['email'];  
      $mobile_no=$updateresult[0]['mobile_no'];
      $gender=$updateresult[0]['gender'];
      $address=$updateresult[0]['address'];
      $password=$updateresult[0]['password'];
  }  
  ?> 
<!-- Main content -->
<section class="content">
  <div class="col">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <form class="was-validated" name="user_creation" id="user_creation" autocomplete="off" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <h5>Name</h5>
                <div class="controls">
                  <input name="name" id="name" rows="3" class="form-control" value="<?php echo $name; ?>" tabindex="1" required>
                  <div id="name_error"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h5>email</h5>
                <div class="controls">
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" tabindex="2"  required>
                  <div id="email_error"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h5>Mobile Number</h5>
                <div class="controls">
                  <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>" maxlength="10" tabindex="3" onkeypress="if((event.keyCode < 46)||(event.keyCode > 57)) event.returnValue = false;" required>
                  <div id="mobile_no_error"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                <h5>Gender</h5>
                <div class="controls">
                  <select class="form-control" name="gender" id="gender" tabindex="4" required>
                    <option value="" >-Select-</option>
                    <option value="male" <?php if($gender=='male'){ echo "selected";} ?>>Male</option>
                    <option value="female" <?php if($gender=='female'){ echo "selected";} ?>>Female</option>
                  </select>
                  <div id="gender_error"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h5>Address</h5>
                <div class="controls">
                  <textarea placeholder="Address" name="address" id="address" class="form-control" tabindex="5" required><?php echo $address; ?></textarea>
                  <div id="address_error"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h5>Password</h5>
                <div class="controls">
                  <input type="text" name="password" id="password" class="form-control" value="<?php echo $password; ?>" tabindex="6" required>
                  <div id="password_error"></div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <a href="index.php?file=user_creation/list" class="float-left btn btn-primary" tabindex="8">Cancel</a>
              <?php if($updateresult==''){?>
              <button type="button" class="float-right btn btn-success" onclick="user_creation_cu('','Add')" tabindex="7">Save</button>
              <?php }else{?>
              <button type="button" class="float-right btn btn-success" onclick="user_creation_cu('<?php echo $updateresult[0]['user_creation_id']?>','Update')" tabindex="7" >Update</button>
              <?php }?>
            </div>
          </div>
          <!-------row ends------>
        </form>
      </div>
      <!-- /.box-body --> 
    </div>
  </div>
</section>
</section>
  <!-- /.content -->