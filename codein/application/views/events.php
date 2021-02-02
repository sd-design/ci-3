<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-11">
                <h4 class="display-4 text-secondary"><?=$title;?></h4>

            </div>
            <div class="col-sm-12">
            <div class="col-6"><?=$calendar;?></div>
        </div>
        <div class="row">
        <?php if($switchCal == TRUE){ ?>

            <?php
            foreach($calendarYear as $month):
?>
<div class="col-sm-3"><div class="shadow m-2 p-2 border" style="height:95%;"><?=$month;?></div></div>
<?php
            endforeach;
        }
        ?>
        </div>
    </div>

    </div>
</body>

</html>