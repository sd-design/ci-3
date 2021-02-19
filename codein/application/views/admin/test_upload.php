<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Add new product : Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1>Add new product</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-danger">Logout</a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-6">
            <?php echo form_open_multipart('admin/upload', 'id="product-form"');?>
<input type='file' name='files[]' multiple data-multiple-caption="{count} files selected" multiple="multiple" id="uploadImages">
        </div>
        <hr>
        <div class="col-sm-11 text-right">
          <button type="submit" class="btn btn-primary" value='Upload' name='upload'>upload</button>
          </div>
                  </form>
      </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){


          $("#uploadImages").on("change",function(){
        var form_data = new FormData();
        var csrf_protection = $("input[name=csrf_protection]:hidden").val();

        var totalfiles = document.getElementById('uploadImages').files.length;
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('uploadImages').files[index]);
        }
        form_data.append("csrf_protection", csrf_protection);
        form_data.append("upload", "Upload");
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/upload",
            dataType: "json",
            contentType: false, // Not to set any content header
            processData: false, // Not to process data
            data: form_data,
            success: function (answer, status, xhr) {
                if(answer.response == true){
                    $('#uploadModal').modal('hide');
                    alert ('Файлы были успешно загружены!');
                }
                if(answer.response == false){
                    alert ('Server error');
                }
            },
            error: function (xhr, status, error) {
                alert(status);
            }
        });
    });

      });
</script>
</body>
</html>
