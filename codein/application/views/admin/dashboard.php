<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title><?=lang('dashboard_title');?> | <?=lang('company_name');?></title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="jumbotron mt-3">
      <h1><?=lang('dashboard_title');?> | <?=lang('company_name');?></h1>
      <h6><?=lang('go_to_site');?> <a href="<?php echo base_url();?>" target="_blank"><?php echo base_url();?></a></h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger"><?=lang('btn_logout');?></a></div>
    </div>
      <div class="row">
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_categories.jpg" class="card-img-top" alt="Категории продукции">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('category_title');?></h4>
                      <p class="card-text"><?=lang('category_desc');?></p>
                      <a href="<?php echo base_url();?>admin/category/new" class="btn btn-primary"><?=lang('new_category');?></a>
                      <a href="<?php echo base_url();?>admin/category/" class="btn btn-success"><?=lang('list_category');?></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_products.jpg" class="card-img-top" alt="Продукция">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('products_title');?></h4>
                      <p class="card-text"><?=lang('products_desc');?></p>
                      <a href="<?php echo base_url();?>admin/products/new" class="btn btn-primary"><?=lang('new_product');?></a>
                      <a href="<?php echo base_url();?>admin/products/" class="btn btn-success"><?=lang('list_products');?></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_orders.jpg" class="card-img-top" alt="Заказы">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('orders_title');?></h4>
                      <p class="card-text"><?=lang('orders_desc');?></p>
                      <a href="<?php echo base_url();?>admin/orders/" class="btn btn-primary"><?=lang('list_orders');?></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_seo_options.jpg" class="card-img-top" alt="SEO-options">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('seo_options_title');?></h4>
                      <p class="card-text"><?=lang('seo_options_desc');?></p>
                      <a href="<?php echo base_url();?>admin/seo_options/" class="btn btn-primary"><?=lang('seo_options');?></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_options.jpg" class="card-img-top" alt="<?=lang('options_title');?>">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('options_title');?></h4>
                      <p class="card-text"><?=lang('options_desc');?></p>
                      <a href="<?php echo base_url();?>admin/options/" class="btn btn-primary"><?=lang('btn_options');?></a>
                      <a href="<?php echo base_url();?>admin/options/bank-proccesing" class="btn btn-secondary"><?=lang('btn_banking');?></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_slider.jpg" class="card-img-top" alt="Settings of slider">
                  <div class="card-body">
                      <h4 class="card-title"><?=lang('slider_title');?></h4>
                      <p class="card-text"><?=lang('slider_desc');?></p>
                      <a href="<?php echo base_url();?>admin/slider/" class="btn btn-primary"><?=lang('btn_slider');?></a>

                  </div>
              </div>
          </div>
      </div>
  </div>

</body>
</html>
