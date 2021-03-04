<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title><?=lang('dashboard_title');?> | <?=lang('company_name');?></title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4"><?=lang('new_category');?></h1>
        <h6><?=lang('dashboard_title');?> | <?=lang('company_name');?></h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success"><?=lang('btn_dashboard');?></a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger"><?=lang('btn_logout');?></a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-6">
              <?php echo form_open('/admin/category/save', 'id="category-form"');?>
              <div class="form-group">
                  <label for="exampleInputEmail1"><?=lang('title_category');?></label>
                  <input type="text" class="form-control" name="title" id="category_title" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">Name of category part.</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1"><?=lang('category_descript');?></label>
                  <textarea class="form-control" name="description" id="category_description" rows="4" required></textarea>
                  <small id="emailHelp" class="form-text text-muted"><?=lang('category_descript_desc');?></small>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1"><?=lang('slug');?></label>
                  <input type="text" class="form-control" name="slug" id="category_slug" required>
                  <small id="emailHelp" class="form-text text-muted"><?=lang('slug_desc');?></small>
              </div>

              <div class="form-group text-left">
                  <button type="submit" class="btn btn-primary"><?=lang('btn_save_category');?></button>
              </div>
              </form>
          </div>

      </div>
  </div>

</body>
</html>
