<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#563d7c">
<style>
.login-logo{opacity:0.3}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/admin/css/floating-labels.css" rel="stylesheet">
  </head>
<div class="form-signin">
        <?php echo form_open('email/send', 'id="login-form"'); ?>
        <div class="text-center mb-4">
            <img class="mb-4 login-logo" src="<?php echo base_url(); ?>assets/images/logo.png" alt="<?=lang('dashboard_title');?>">
            <h1 class="h3 mb-3 font-weight-normal"><?=lang('dashboard_title');?></h1>
            <p><a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></p>
        </div>

        <div class="form-label-group">
            <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="<?=lang('plc_login');?>" required autofocus>
            <label for="inputEmail"><?=lang('plc_login');?></label>
        </div>

        <div class="form-label-group">
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="<?=lang('plc_password');?>" required>
            <label for="inputPassword"><?=lang('plc_password');?></label>
        </div>

        <div class="checkbox mb-3">
            <span class="text-right"><a href="<?php echo base_url(); ?>admin/user/passwordreset"><?=lang('link_reset_pwd');?></a></span>
        </div>
</form>
  <button class="btn btn-lg btn-primary btn-block" id="send_form"><?=lang('btn_login');?></button>
  <p class="mt-5 mb-3 text-muted text-center"><?=lang('company_name');?> &copy; <script>document.write(new Date().getFullYear())</script></p>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    if(localStorage.getItem('username')) $('#inputEmail').val(localStorage.getItem('username'));
  function validationForm(){
if($('#inputEmail').val().length > 3 && $('#inputPassword').val().length > 3){
$("label.error").remove();
return true;
}
else{$('#inputEmail').after('<label class="error">Please enter Kundennummer</label>');
$('#inputPassword').after('<label class="error">Please provide a Passwort</label>');
console.log($('#inputEmail').val().length +" : " + $('#inputPassword').val().length);
 return false;}
  }
  $('#inputEmail').on('blur', function () {
  let email = $(this).val();
  if (email.length > 0
  && (email.match(/.+?\@.+/g) || []).length < 3) {
    console.log('invalid');
    $('#inputEmail').after('<label class="error">Please enter valid Kundennummer</label>');
  } else {
    $("label.error").remove();
    return true;
  }
});
$('#inputPassword').on('blur', function () {
let passwd = $(this).val();
if (passwd.length > 0 && passwd.length < 3) {
  console.log('invalid pass');
  $('#inputPassword').after('<label class="error">Please provide a Passwort</label>');
} else {
  $("label.error").remove();
  return true;
}
});
$("#inputEmail").focus(function(){
  $("label.error").remove();
});
$("#inputPassword").focus(function(){
  $("label.error").remove();
});
    $('#inputPassword').keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            $('#send_form').trigger('click');
        }
    });
$('#send_form').on('click', function(){
   var csrf_protection = $("input[name=csrf_protection]:hidden").val();
   var inputEmail = $('#inputEmail').val();
   var inputPassword = $('#inputPassword').val();
if(validationForm() == true){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/login/signin",
            data: {'csrf_protection':csrf_protection,'inputEmail':inputEmail,'inputPassword':inputPassword},
            success: function (answer) {
                console.log(answer);
                if (answer.response == true) {
                    console.log(answer.user);
                    localStorage.setItem('username', answer.username);
                    localStorage.setItem('token', answer.token);
                    window.location.replace('/admin/'+answer.url);
                }
                else { alert("Server: Incorrect Kundennummer or Passwort"); }
            },
            error: function (xhr, ajaxOptions, thrownError) {
        if(xhr.status==403) {
            alert("<?=lang('error_login_403');?>"); 
        }
        if(xhr.status==401) {
            alert("<?=lang('error_login_401');?>"); 
        }
      }
        });
      }
      else{
        console.log('validation_error');
      }
        return false;
});


});
</script>
</body>
</html>
