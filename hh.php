<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    $errors = upload_file ($_FILES['avatar'], 'bg');
    if(empty($errors)) {
      header('location: index.php');
    }
    else {
      foreach($errors as $error):
        echo $error;
      endforeach;
    }
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="avatar" id="avatar" class="upload"/>
  <input type="submit" value="Upload">
</form>