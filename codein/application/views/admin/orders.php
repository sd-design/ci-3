<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de" ng-app="orders"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Orders : Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/angular.min.js"></script>
</head>
<body id="dashboard" ng-controller="OrdersController as OrderCtrl">
<!-- push alert -->
<div class="fixed-top" style="z-index:11000">
    <div class="toast" style="position: absolute; top: 110px; right: 30px;" role="alert" aria-live="assertive" data-delay="1000">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
            <strong class="mr-auto">Saving</strong>
            <small></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Comment was save.
        </div>
    </div>
</div>
<!-- end push alert -->
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4">Orders</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>

      <div class="row">
          <div class="col-sm-12">
              <hr class="featurette-divider">
              <div class="row"><div class="col-md-9 mb-3"><p class="text-right text-primary pt-2">find by Name:</p></div><div class="col-md-3"><input type="text" ng-model="search" class="form-control search"></div></div>
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Client</th>
                      <th scope="col">Order price</th>
                      <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                      <tr ng-repeat="item in listOrders | filter:search">
                      <th scope="row" ng-cloak>{{item.ID}}</th>
                      <td scope="row" ng-cloak>{{item.client_name}} {{item.client_lastname}}</td>
                      <td ng-cloak>{{item.order_sum}}</td>
                      <td width="250px;" ng-cloak><button class="detail-btn btn btn-sm btn-info" data-toggle="modal" data-target="#modalDetail" data-check="1" ng-click="getDetail($event)" data-id="{{item.ID}}">Details</button>
                          &nbsp;<button class="status-btn btn btn-sm btn-warning" data-toggle="modal" data-target="#modalStatus" data-check="1" data-id="{{item.ID}}" ng-click="getStatus($event)">Status</button>
                          &nbsp;<button class="edit-btn btn btn-sm btn-secondary" data-toggle="modal" data-target="#modalEdit" data-check="1" data-id="{{item.ID}}" ng-click="getDetail($event)">Edit</button></td>
                      </tr>

                                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- MODAL Detail -->
  <div class="modal fade" id="modalDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title" id="staticBackdropLabel">Order detail</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body order_info">
                  <div class="row">
                      <div class="col-sm-6"><h5 class="text-uppercase">Client Info:</h5>
                          <p>
                              <span class="descript">Name of client: </span><span>{{detailOrder.client_name}}&nbsp;{{detailOrder.client_lastname}} </span><br>
                              <span class="descript">E-mail: </span><span>{{detailOrder.email}}</span><br>
                              <span class="descript">Telefon: </span><span>{{detailOrder.telefon}}</span><br>
                          </p>
                      </div>
                      <div class="col-sm-6">
                          <h5 class="text-uppercase">Detail of transaction:</h5>
                          <p>
                              <span class="descript">Payment type: </span><span>{{detailOrder.payment_type}}</span><br>
                              <span class="descript">Payment status: </span><span>{{paymentOrder.name}}</span><br>
                          </p>
                      </div>
                    <div class="col-sm-12"><hr></div>
                      <div class="col-sm-6"><h5 class="text-uppercase">Order List:</h5>
                          <div ng-repeat="product in productList">
                              <span class="descript">Product: </span><span>{{product.name}} | {{product.price}}</span><br>
                          </div>
                          <hr>
                          <span class="descript">TOTAL: </span><span>{{detailOrder.order_sum}} EUR</span>
                      </div>
                      <div class="col-sm-5"><h5 class="text-uppercase">Note:</h5>
                          <p class="order_note">{{detailOrder.note}}</p>
                      </div>
                      <div class="col-sm-12"><hr></div>
                      <div class="col-sm-7"><h6 class="text-uppercase">Versandadresse:</h6>
                          <p>
                          <span ng-bind-html="detailOrder.address | to_trusted"></span><br>
                          </p>
                          <h6 class="text-uppercase">Telefon:</h6>
                          <span>{{detailOrder.telefon}}</span><br>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>


  <!-- MODAL Edit -->
  <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit order</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body order_info">
                 <div class="row">
                     <div class="col-sm-6"><h5>Client Info</h5>
                     <p>
                         <span class="descript">Kundenk: </span><span>{{detailOrder.client_name}}&nbsp;{{detailOrder.client_lastname}} </span><br>
                         <span class="descript">E-mail: </span><span>{{detailOrder.email}}</span><br>
                         <span class="descript">Telefon: </span><span>{{detailOrder.telefon}}</span><br>
                         <hr>
                         <span class="descript">Versandadresse:</span><br><span ng-bind-html="detailOrder.address | to_trusted"></span><br>
                         <hr>
                         </p>

                             <span class="descript">Status of order:</span><br>
                         <div class="form-label-group mt-2">
                             <select class="form-control custom-select d-block w-50" name="order_status" id="selectStatus">
                                 <option value="0">Status</option>
                                 <?php foreach ($select_list as $select):?>
                                 <option value="<?=$select->ID;?>" ><?=$select->lang_name;?></option>
                                 <?php endforeach;?>
                             </select>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <h5>Kommentar</h5>
                         <div class="form-label-group mb-3">
                         <textarea name="note" id="orderNote" cols="30" rows="10" class="form-control order_comment"></textarea>
                         </div>
                         <div class="form-label-group text-right"><button type="button" class="btn btn-sm btn-info" id="saveComment" data-comment="{{commentID}}">Save kommentar</button></div>
                     </div>
                 </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!-- MODAL Status -->
  <div class="modal fade" id="modalStatus" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Transaktion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body order_info">
                  <div class="row">
                      <div class="col-sm-6"><h5 class="text-uppercase">Ergebnis info: </h5>
                          <p>
                              <span class="descript">Transaction: </span><span>{{statusOrder.AcquirerResponse}} </span><br>
                              <span class="descript">Menge: </span><span>{{statusOrder.amount}}</span> EUR<br>
                              <span class="descript">Time of transaction: </span><span>{{statusOrder.time}}</span><br>
                          </p>
                      </div>
                      <div class="col-sm-6"></div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>


  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>admin/js/orders"></script>
</body>
</html>
