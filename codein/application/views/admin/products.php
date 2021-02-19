<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Products : Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4">Products</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
      <hr>
      <div class="row">
          <div class="col-sm-12 pb-2 "><div class="col-3 float-right">
                      <select class="form-control" id="selectType">
                          <option value="0">Choose type of products</option>
                          <?php foreach($list_type as $item): ?>
                              <option value="<?=$item->ID;?>"><?=$item->type_product;?> products</option>
                          <?php endforeach; ?>
                      </select>
                  </div></div>
          <div class="col-sm-12">
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Produkte</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($list_products as $item): ?>
                      <tr>
                      <th scope="row"><?=$item->ID;?></th>
                      <td scope="row"><?=$item->name;?></td>
                      <td><?=$item->price;?></td>
                      <td width="110px;"><a href="<?php echo base_url();?>admin/products/edit/<?=$item->ID;?>">Edit</a></td>
                      </tr>
                    <?php endforeach; ?>

                                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/angular.min.js"></script>
  <script type="text/javascript">
      $('#selectType').change(function(){

          console.log($('#selectType').val());
          if($('#selectType').val() == 0){}
          else {
              document.location.href = '/admin/products/type/' + $('#selectType').val()
          }
      });
  </script>
</body>
</html>
