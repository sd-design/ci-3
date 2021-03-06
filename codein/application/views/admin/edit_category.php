<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
<div class="container">
    <div class="mt-3 mb-3">
        <?php  foreach($edit_cat as $item): ?>
        <h1 class="display-4">Edit category <b><?=$item->name;?></b> </h1>
        <h6>Kundenmenü | Deholdingstore</h6>
        <div class="text-right"><a href="<?php echo base_url();?>admin/category" class="btn btn-sm btn-primary">Categories</a>&nbsp;<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
<hr>
    <div class="row">
        <div class="col-sm-6">
            <?php echo form_open('/admin/category/update', 'id="category-form"');?>
            <input type="hidden" class="form-control" name="id" value="<?=$item->ID;?>" id="category_id">
            <div class="form-group">
                <label for="exampleInputEmail1">Title of Category</label>
                <input type="text" class="form-control" name="title" id="category_title" aria-describedby="emailHelp" value="<?=$item->name;?>" required>
                <small id="emailHelp" class="form-text text-muted">Name of category part.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description of category</label>
                <textarea class="form-control" name="description" id="category_description" rows="4" required><?=$item->description;?></textarea>
                <small id="emailHelp" class="form-text text-muted">Full text of description.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug</label>
                <input type="text" class="form-control" name="slug" id="category_slug" value="<?=$item->slug;?>" required>
                <small id="emailHelp" class="form-text text-muted">This value use for url of category.</small>
            </div>

            <div class="form-group text-left">
                <button type="submit" class="btn btn-primary">Update category</button>
            </div>
            </form>
        </div>

    </div>
    <?php endforeach; ?>
</div>

</body>
</html>
