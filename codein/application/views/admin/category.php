<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4">Categories</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>

      <div class="row">
          <div class="col-sm-12">
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">description</th>
                      <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($list_cat as $item): ?>
                      <tr>
                      <th scope="row"><?=$item->ID;?></th>
                      <td width="200px;"><a href="<?php echo base_url();?>produkte/<?=$item->slug;?>" target="_blank"><?=$item->name;?></a></td>
                      <td><?=$item->description;?></td>
                      <td width="110px;"><a href="<?php echo base_url();?>admin/category/edit/<?=$item->ID;?>">Edit</a></td>
                      </tr>
                    <?php endforeach; ?>

                                  </tbody>
              </table>
          </div>
      </div>
  </div>

</body>
</html>
