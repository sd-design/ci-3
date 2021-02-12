<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Upload Multi files form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container pt-5">

<?php if(isset($error)) echo $error;?>

<?php echo form_open_multipart('upload/do_upload_multi');?>

<input type="file" name="files[]" size="20" multiple accept="image/*,image/jpeg" class="form-control" />

<br /><br />

<input type="submit" class="btn btn-primary" value="upload" />

</form>
</div>
</body>
</html>