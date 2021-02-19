<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1>Edit slide</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
  <div class="text-right"><a href="<?php echo base_url();?>admin/slider" class="btn btn-sm btn-primary">List of slides</a>&nbsp;<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-6">
              <?php echo form_open('/admin/slider/update', 'id="category-form"');?>
              <?php foreach($slide as $item): ?>
              <input type="hidden" name="id" id="slide_ID" value="<?=$item->ID;?>">
              <div class="form-group">
                  <label for="exampleInputEmail1">Title of slide</label>
                  <input type="text" class="form-control" name="title" id="slide_title" required value="<?=$item->title;?>">

              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Link for slide</label>
                  <input type="text" class="form-control" name="link" id="slide_link" value="<?=$item->link;?>">

              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Sort</label>
                  <input type="text" class="form-control" name="slug" id="slide_sort" value="<?=$item->sort;?>">
                  <small id="emailHelp" class="form-text text-muted">Default value 100.</small>
              </div>

          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <a href="#" id="changeImage" class="change_image" data-toggle="popover" data-placement="top" data-content="Click to change image">
              <img src="<?php echo base_url();?>upload/slider/<?=$item->image;?>" alt="" class="img-thumbnail" id="currentImage"></a>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="image" id="slide_image" value="<?=$item->image;?>" readonly>
          </div>
          </div>
          <hr>
          <div class="col-sm-12">
            <div class="form-group text-left">
                <button type="submit" class="btn btn-primary">Update slide</button>
            </div>
          </div>
        <?php endforeach; ?>
        </form>
      </div>
  </div>
  <!-- UPLOAD MODAL --->
  <div class="modal fade" id="uploadModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body box">
          <input type="file" id="uploadImage" name="file" class="inputfile inputfile-4">
          <label for="file">
  					<figure>
  						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
  							<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
  						</svg>
  					</figure>
  					<span>Choose a files…</span></label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  function sendFile() {
      var form_data = new FormData();
      var csrf_protection = $("input[name=csrf_protection]:hidden").val();
      form_data.append("csrf_protection", csrf_protection);
      form_data.append("upload", "Upload");
      form_data.append('file', $('#uploadImage')[0].files[0]);
      $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/upload/slider",
          dataType: "json",
          contentType: false, // Not to set any content header
          processData: false, // Not to process data
          data: form_data,
          success: function (answer, status, xhr) {
              if(answer.response == true){
                  $('#uploadModal').modal('hide');
                  $("#slide_image").val(answer.filename);

                      $("#slide_image").val();
                      $('#currentImage').attr("src", "/upload/slider/"+answer.filename);
                      alert ('Image was upload');
              }
              if(answer.response == false){
                  alert ('Server error');
              }
          },
          error: function (xhr, status, error) {
              alert(status);
          }
      });
    }

    $(document).ready(function(){
      $('#changeImage').mouseover(function(){
        $('#changeImage').popover('show');
      });
      $('#changeImage').mouseout(function(){
        $('#changeImage').popover('hide');
      });
    });
    $('#changeImage').on('click', function(){
        $('#changeImage').popover('hide');
      $('#uploadModal').modal('show');
    });

    $("#uploadImage").on("change",function(){
        sendFile();
    });
  </script>

</body>
</html>
