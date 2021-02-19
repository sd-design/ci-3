<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Edit product : Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
<?php foreach($edit_prod as $prod): ?>
  <div class="container">
    <div class="mt-3 mb-3">
      <h1><?=$prod->name;?> <small>[edit]</small></h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/products/" class="btn btn-sm btn-info">List of products</a>&nbsp;<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-6">
            <?php echo form_open('/admin/products/save', 'id="product-form"');?>
      <div class="form-group">
      <label for="exampleInputEmail1">Title of product</label>
          <input type="hidden" name="product_id" value="<?=$prod->ID;?>">
      <input type="text" class="form-control" name="title" id="product_title" value="<?=$prod->name;?>" aria-describedby="titleHelp" required>
      <small id="emailHelp" class="form-text text-muted">Name of Product in category part.</small>
    </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Category select</label>
    <select class="form-control custom-select" id="category_id" name="category_id">
      <option value="0" selected disabled>Choise category</option>
      <?php foreach($list_cat as $item): ?>
      <option value="<?=$item->ID;?>" <?php if($item->ID == $prod->category_id){?> selected="selected"<?php }?>><?=$item->name;?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
<label for="exampleInputEmail1">Short description of product</label>
<input type="text" class="form-control" name="short_description" id="short_description" value="<?=$prod->short_description;?>">
<small id="emailHelp" class="form-text text-muted">Short text for description</small>
</div>
  <div class="form-group">
<label for="exampleInputEmail1">Full description of product</label>
<textarea class="form-control" name="full_description" id="full_description" rows="5"><?=$prod->description;?></textarea>
<small id="emailHelp" class="form-text text-muted">Full text of description.</small>
</div>
<div class="form-group">
    <div class="thumb_img"><img src="<?=base_url();?>upload/iblock/<?=$prod->img_thumb;?>" alt=""></div>
    <label for="exampleFormControlFile1">General image</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><?=base_url();?>upload/iblock/</span>
        </div>
        <input type="text" class="form-control disabled" name="img_thumb" value="<?=$prod->img_thumb;?>" id="product_image_name" aria-describedby="basic-addon3" disabled>
    </div>

    <input type="file" class="form-control-file" name="image" id="product_image">
    <small id="emailHelp" class="form-text text-muted">Image of Product (thumbnail in list of category)</small>
  </div>
</div>
  <div class="col-sm-5">
    <div class="form-group">
    <label for="exampleInputEmail1">Slug</label>
    <input type="text" class="form-control" name="slug" id="product_slug" value="<?=$prod->slug;?>" required>
    <small id="emailHelp" class="form-text text-muted">This value use for url of product.</small>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputPricePrepend">&euro;</span>
        </div>
    <input type="text" class="form-control" name="price" id="product_price" value="<?=$prod->price;?>" required>
    </div>
    </div>
      <?php endforeach; ?>
      <div class="form-group">
      <label for="exampleInputEmail1">Discount</label>
      <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputDiscountPrepend">%</span>
          </div>
          <select class="form-control custom-select" name="discount" id="product_discount" name="category_id">
            <option value="0" selected disabled>Choise discount</option>
            <?php foreach($list_discounts as $dis): ?>
            <option value="<?=$dis->ID;?>" <?php if($dis->ID == $prod->discounts_id){?> selected="selected"<?php }?>><?=$dis->name;?></option>
            <?php endforeach; ?>
          </select>
      </div>

        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Video from youtube</label>
        <input type="text" class="form-control" name="video_url" id="video_url" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">For videoplayer.</small>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Add more images for product</label><br>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">Add images</button>
    </div>
      <div class="form-group">
          <div class="col-12 border" id="uploadFilesList"></div>
      </div>
      <input type="hidden" class="form-control" name="files" id="uploadFiles">
        </div>
        <hr>
        <div class="col-sm-11 text-right">
          <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
                  </form>
      </div>
  </div>
<!-- UPLOAD MODAL --->
<div class="modal fade" id="uploadModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body box">
        <input type="file" id="uploadImages" name="files[]" multiple="multiple" class="inputfile inputfile-4">
        <label for="files">
					<figure>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
							<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
						</svg>
					</figure>
					<span>Choose a files…</span></label>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary" id="sendUploadImages">Unpload</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
function sendFiles() {
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
                $("#uploadFiles").val(answer.files);
                answer.files.forEach(function(item, i, arr) {
                    $("#uploadFilesList").append(" "+item+"<br>");
                });
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
	}
$(document).ready(function(){
    $("#uploadImages").on("change",function(){
        sendFiles();
    });
   $('#sendUploadImages').on('click', function(){
    		sendFiles();
  });
});
</script>
</body>
</html>
