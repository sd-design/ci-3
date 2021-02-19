<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="jumbotron mt-3">
      <h1>Kundenmenü | Deholdingstore</h1>
      <h6>go to <a href="<?php echo base_url();?>" target="_blank"><?php echo base_url();?></a></h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
      <div class="row">
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_categories.jpg" class="card-img-top" alt="Категории продукции">
                  <div class="card-body">
                      <h4 class="card-title">Categories</h4>
                      <p class="card-text">Categories of products. Create new, editing, delete.</p>
                      <a href="<?php echo base_url();?>admin/category/new" class="btn btn-primary">Create new</a>
                      <a href="<?php echo base_url();?>admin/category/" class="btn btn-success">List of category</a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_products.jpg" class="card-img-top" alt="Продукция">
                  <div class="card-body">
                      <h4 class="card-title">Catalog of products</h4>
                      <p class="card-text">List of products.<br> Add new, editing of products.</p>
                      <a href="<?php echo base_url();?>admin/products/new" class="btn btn-primary">Add product</a>
                      <a href="<?php echo base_url();?>admin/products/" class="btn btn-success">List of products</a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_orders.jpg" class="card-img-top" alt="Заказы">
                  <div class="card-body">
                      <h4 class="card-title">Orders</h4>
                      <p class="card-text">Information of orders.<br> Statuses of orders.</p>
                      <a href="<?php echo base_url();?>admin/orders/" class="btn btn-primary">List of orders</a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_seo_options.jpg" class="card-img-top" alt="SEO-options">
                  <div class="card-body">
                      <h4 class="card-title">SEO-options</h4>
                      <p class="card-text">Settings of meta-teags, ogi-tags in header of pages.</p>
                      <a href="<?php echo base_url();?>admin/seo_options/" class="btn btn-primary">SEO settings</a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_options.jpg" class="card-img-top" alt="Settings of store">
                  <div class="card-body">
                      <h4 class="card-title">Settings of store</h4>
                      <p class="card-text">E-mail of managers, contacts.<br>Bank-proccesing.</p>
                      <a href="<?php echo base_url();?>admin/options/" class="btn btn-primary">Settings</a>
                      <a href="<?php echo base_url();?>admin/options/bank-proccesing" class="btn btn-secondary">Bank-proccesing</a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card" style="width: 100%;">
                  <img src="<?php echo base_url();?>assets/images/bg_slider.jpg" class="card-img-top" alt="Settings of slider">
                  <div class="card-body">
                      <h4 class="card-title">Slider on index page</h4>
                      <p class="card-text">E-mail of managers, contacts.<br>Bank-proccesing.</p>
                      <a href="<?php echo base_url();?>admin/slider/" class="btn btn-primary">Change slides</a>

                  </div>
              </div>
          </div>
      </div>
  </div>

</body>
</html>
