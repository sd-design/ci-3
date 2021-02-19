<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4">New user of shop</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/options" class="btn btn-sm btn-primary">Settings</a>&nbsp;<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-6">
              <?php echo form_open('/admin/options/save_new_user', 'id="category-form"');?>
   <?php if(validation_errors()){?><div class="border border-danger p-3 mb-3 rounded-sm text-danger"><?php echo validation_errors();?></div><?php } ?>
              <div class="border rounded-sm p-3 bg-lighte">
              <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <div class="row">
                      <div class="col">
                          <input type="text" class="form-control" name="name"  placeholder="First name" value="<?php echo set_value('name'); ?>" required>
                          <small id="nameHelp" class="form-text text-muted">First Name.</small>
                      </div>
                      <div class="col">
                          <input type="text" class="form-control" name="lastname" placeholder="Last name" value="<?php echo set_value('lastname'); ?>" required>
                          <small id="lastnameHelp" class="form-text text-muted">Last Name.</small>
                      </div>
               </div>
              </div>
                  <div class="border rounded-sm p-3">
              <div class="form-group">
                  <div class="row">
                      <div class="col-8">
                  <label for="exampleInputEmail1">Login (E-mail)</label>
                  <input type="email" class="form-control" name="email" id="category_title" aria-describedby="emailHelp" required value="<?php echo set_value('email'); ?>">
                  <small id="emailHelp" class="form-text text-muted">E-mail will be used for authorization.</small>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" name="password" id="inputPwd" required>
                  <small id="emailHelp" class="form-text text-muted"></small>
              </div>
                  <div class="col">
                      <label for="exampleInputEmail1">Confirm Password</label>
                      <input type="password" class="form-control" name="passconf" id="inputPwd2" required>
                      <small id="emailHelp" class="form-text text-muted">Repeat password</small>
                  </div>
                  </div>
              </div>
                  </div>
                  <div class="form-group pt-3">
                      <div class="row">
                          <div class="col-5">
                      <label for="exampleInputuserLevel">Access level</label>
                      <select name="access" id="userLevel" class="form-control" required>
                          <option value="0">Select level</option>
                          <?php foreach($accessLevels as $access):?>
                              <option value="<?=$access->ID;?>" <?php if($access->ID == set_value('access')){ echo "selected"; }?>><?=$access->name_level;?></option>

                          <?php endforeach;?>
                      </select>
                      <small id="userLevelHelp" class="form-text text-muted">Select of access level for user.</small>
                          </div>
                      </div>
                  </div>
              <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Save new user</button>
              </div>
              </form>
          </div>
      </div>
  </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    function checkPwd(){
var pwd = $('#inputPwd').val();
var pwd2 = $('#inputPwd2').val();
        if(pwd != pwd2){
            alert("Password and Confirm Password not valid!");
        }
    };
        $('#inputPwd2').focusout(function(){
            //console.log($('#inputPwd').val().length);
            if($('#inputPwd').val().length > 1 && $('#inputPwd2').val().length > 1){
                    checkPwd();
            }
        });
    });

</script>
</body>
</html>
