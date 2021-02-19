<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content="deholdingstore.de"><title>Kundenmenü | Deholdingstore</title>
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#563d7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>
<div class="container">
    <div class="jumbotron mt-3">
        <h1>Kundenmenü | Deholdingstore</h1>
        <h6>go to <a href="<?php echo base_url();?>" target="_blank"><?php echo base_url();?></a></h6>
        <div class="text-right"><a href="<?php echo base_url();?>admin/login/out" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
    <h2 class="display-2">Lis of methods:</h2>
    <a href="/admin/tech/list_dbs">List of databases</a><br>
    <a href="/admin/tech/list_tables">List of tables</a><br>
    <a href="/admin/tech/fields_table/news">List of field of News table</a>
</div>
</body>
</html>
