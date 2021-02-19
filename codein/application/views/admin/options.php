<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="dashboard">
<!-- push alert -->
<div class="fixed-top">
    <div class="toast" style="position: absolute; top: 110px; left: 70px;" role="alert" aria-live="assertive" data-delay="1000">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
            <strong class="mr-auto">Number of news</strong>
            <small></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Number of news was change.
        </div>
    </div>
</div>
<!-- end push alert -->
  <div class="container">
    <div class="mt-3 mb-3">
        <h1 class="display-4">Settings of store</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-danger">Logout</a></div>
    </div>
<hr>
      <div class="row">
          <div class="col-sm-4">
<div class="border border-gray rounded-sm p-4">
    <h4>Users of shop</h4>
    <hr>
    <a href="/admin/options/new_user">Add new user</a> | <a href="javascript:void(0);" class="btn-link" id="showUsersList">Edit users</a>
</div>
              <div class="border border-gray rounded-sm p-4 mt-3">
                  <h4>Number of news per page</h4>
                  <hr>
                  <div class="row">
                      <div class="col-4"><input type="text" class="form-control" id="qtyNews" value="">
                      </div>
                      <div class="col-8"><btn class="btn btn-primary " id="saveNews">save</a>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-sm-8 sr-only" id="actionPano">
              <div class="border border-gray p-4">
                  <h5>List of admin panel users</h5>
                  <ul id="userList"></ul>
              </div>

          </div>

      </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript">

      const qtyNews = document.getElementById("qtyNews");
      const saveNews = document.querySelector("#saveNews");
      const actionPano = document.getElementById("actionPano");
      const listUsers = document.getElementById("userList");
      const showUsersList = document.querySelector("#showUsersList");

      async function getQtyNews(){
          let response = await fetch('/admin/api/option_qty_news', {
              method: 'GET'
          });
          let result = await response.text()
          console.log(result)
          qtyNews.value = result
      }


      async function sendNews(){

          const formData  = new FormData();
          let csrf_protection = '<?php echo $this->security->get_csrf_hash();?>';
          formData.append('csrf_protection', csrf_protection);
          formData.append('qty', qtyNews.value);

          let response = await fetch('/admin/api/save_qty_news', {
              method: 'POST',
              body: formData
          });
          let result = await response.json();
          if(result.answer == true){
              $('.toast').toast('show');
          }

      }

      function toggleActionPano() {
          actionPano.classList.toggle("sr-only");
          if(actionPano.classList.contains("sr-only")){
              listUsers.innerHTML =''
          }
          else{

          }
      }

      async function getData(){
          let response = await fetch('/admin/api/users_list', {
              method: 'GET'
          });
          let result = await response.json();
          for(const item of result){
              var li = document.createElement('li')
              li.innerHTML = '<a href="/admin/options/edit_user/'+item.ID+'" class="text-info">'+item.name+' '+ item.lastname +'</a>';
              listUsers.appendChild(li)
          }
          toggleActionPano()
      }
      getQtyNews()
      showUsersList.addEventListener("click", getData);
      saveNews.addEventListener("click", sendNews);
  </script>
</body>
</html>
