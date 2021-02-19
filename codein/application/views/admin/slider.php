<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
</head>
<body id="slider">
<!-- push alert -->
<div class="fixed-top">
    <div class="toast" style="position: absolute; top: 110px; right: 30px;" role="alert" aria-live="assertive" data-delay="1000">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
            <strong class="mr-auto">Status of slide</strong>
            <small></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Status of slide was change.
        </div>
    </div>
</div>
<!-- end push alert -->
  <div class="container">
    <div class="mt-3 mb-3">
      <h1 class="display-4">Slider of Index page</h1>
        <h6>Kundenmenü | Deholdingstore</h6>
      <div class="text-right"><a href="<?php echo base_url();?>admin/dashboard" class="btn btn-sm btn-success">Dashboard</a>&nbsp;<a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
    <hr>
      <div class="row">
          <div class="col-sm-8">
            <?php foreach($slider as $item): ?>
            <div class="card mb-3 <?php if($item->active == 'on'){}else {
              echo "bg-light bg_transp";
            }?>" style="max-width: 100%;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="<?php echo base_url();?>upload/slider/<?=$item->image;?>" class="card-img" alt="<?=$item->title;?>">
                </div>
  <div class="col-md-6">
    <div class="card-body">
      <h5 class="card-title"><?=$item->title;?></h5>
      <p class="card-text">link: <a href="<?=$item->link;?>"><?=$item->link;?></a></p>
      <p class="card-text"><small class="text-muted">status: <b class="btn_switch_slider <?php if($item->active == 'on'){echo "text-success";}else {
        echo "text-danger";
      }?>" data-switch="<?=$item->active;?>" data-id="<?=$item->ID;?>"><?=$item->active;?></b></small></p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card-body">
      <a class="btn btn-sm btn-info" href="<?=base_url();?>admin/slider/edit/<?=$item->ID;?>">Edit</a>
      <a class="btn btn-sm btn-danger" href="<?=base_url();?>admin/slider/delete/<?=$item->ID;?>">&times;</a>

    </div>
  </div>

</div>
</div>
<?php endforeach; ?>

          </div>
          <div class="col-sm-4">
            <a href="<?php echo base_url();?>admin/slider/new" class="btn btn-lg btn-primary">Add new slide</a>
          </div>

      </div>

  </div><!-- end container -->

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">

      function putStatus(id,status){
          var csrf_token = '<?php echo $this->security->get_csrf_hash();?>';
          $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>admin/slider/status_change",
              data: {csrf_protection: csrf_token, id: id, status: status},
              success: function (answer, status, xhr) {
                  if(answer.response == true){
                      $('.toast').toast('show');
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
          $('.btn_switch_slider').on('click',function(){
              var status = $(this).data('switch');
              var slider_id = $(this).data('id');
              if(status == 'on'){$(this).removeClass('text-success');$(this).addClass('text-danger');$(this).text('off');$(this).data('switch','off');putStatus(slider_id,'off');}
              else{$(this).removeClass('text-danger');$(this).addClass('text-success');$(this).text('on');$(this).data('switch','on');putStatus(slider_id,'on');}

          });
      });
  </script>
</body>
</html>
