<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title><?=lang('dashboard_title');?> | <?=lang('company_name');?></title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4"><?=lang('seo_options_title');?> </h1>
        <h6><?=lang('dashboard_title');?> | <?=lang('company_name');?></h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success"><?=lang('btn_dashboard');?></a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger"><?=lang('btn_logout');?></a></div>
    </div>

      <div class="row">
          <div class="col-sm-12">
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Position</th>
                      <th scope="col">Head title</th>
                      <th scope="col">Meta_words</th>
                      <th scope="col">Meta_descript</th>
                      <th scope="col">Og_image</th>
                      <th scope="col">action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($list_meta as $item): ?>
                      <tr>
                      <th scope="row"><?=$item->ID;?></th>
                      <td><?=$item->position;?></td>
                      <td><?=$item->head_title;?></td>
                      <td><?=$item->meta_words;?></td>
                      <td><?=$item->meta_descript;?></td>
                      <td><img class="ogi_img_admin" src="<?php echo base_url();?>assets/images/<?=$item->og_image;?>" alt=""></td>
                      <td><a href="<?php echo base_url();?>admin/seo_options/edit/<?=$item->ID;?>">Edit</a></td>
                      </tr>
                    <?php endforeach; ?>

                                  </tbody>
              </table>
          </div>
      </div>
  </div>

</body>
</html>
