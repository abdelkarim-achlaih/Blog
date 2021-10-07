<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    upload_file ($_FILES['avatar'], 'bg');
    if(! isset($_SESSION['message_error'])) {
      header('location: index.php');
    }
    else {
      echo $_SESSION['message_error'];
      unset($_SESSION['message_error']);
    }
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="avatar" id="avatar" class="upload"/>
  <input type="submit" value="Upload">
</form>