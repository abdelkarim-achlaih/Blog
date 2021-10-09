<?php
function remove_script ($array) {
  foreach($array as $key => $value) {
    $array[$key] = strip_tags($array[$key]);
  }
  return $array;
}
function print_array ($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
function show_message ($message, $title) {
  if($title == 'Error') {
    $color ='red';
  }
  elseif($title == 'Success') {
    $color ='green';
  }
  elseif($title == 'Notification') {
    $color ='blue';
  }
  echo '
    <section class="message-section">
      <div class="container">
        <div class="message '.$color.'">
          <h4>'.$title.'</h4>
          <div class="message-name">
  ';
  echo $message ;
  echo '
          </div>
        </div>
      </div>
    </section>
  ' ;
}
function show_index_message ($message) {
  echo '
      <section class="index-message-hide" id="hide">'
        .$message.
      '</section>
  ';
}
function edit_date ($date) {
  $current_date = date('Y-m-d');
  $date = date('Y-m-d', strtotime($date));
  $current_date_edited = [
    date('Y-m-d', strtotime($current_date)),
    date('Y-m-d', strtotime($current_date.' -1 day')),
    date('Y-m-d', strtotime($current_date.' -2 days')),
    date('Y-m-d', strtotime($current_date.' -3 days')),
    date('Y-m-d', strtotime($current_date.' -4 days')),
    date('Y-m-d', strtotime($current_date.' -5 days')),
    date('Y-m-d', strtotime($current_date.' -6 days')),
    date('Y-m-d', strtotime($current_date.' -1 week')),
    date('Y-m-d', strtotime($current_date.' -1 month')),
    date('Y-m-d', strtotime($current_date.' -1 year'))
  ];
  if($date == $current_date_edited[0]) {
    return 'Today';
  }
  elseif($date == $current_date_edited[1]) {
    return 'Yesterday';
  }
  elseif($date == $current_date_edited[2]) {
    return 'Two days ago';
  }
  elseif($date == $current_date_edited[3]) {
    return 'Three days ago';
  }
  elseif($date == $current_date_edited[4]) {
    return 'Four days ago';
  }
  elseif($date == $current_date_edited[5]) {
    return 'Five days ago';
  }
  elseif($date == $current_date_edited[6]) {
    return 'Six days ago';
  }
  elseif($date == $current_date_edited[7]) {
    return 'Last week';
  }
  elseif($date == $current_date_edited[8]) {
    return 'Last month';
  }
  elseif($date == $current_date_edited[9]) {
    return 'Last year';
  }
  else {
    return date('l jS F Y', strtotime($date));
  }
}
function error ($source=NULL, $type=NULL) {
  $sources = array('blog.php', 'config.php', 'blog-settings');
  if(! in_array($source, $sources)) {
    echo 'hello source not correct';
  }
  else {
    if($type == 1) {    //1 = mesage_index
      if(isset($_SESSION['message_index'])) {
        show_index_message($_SESSION['message_index']);
        unset($_SESSION['message_index']);
      }
    }
    elseif($type == 2) {//1 = message_success
      if(isset($_SESSION['message_success'])) {
        show_message ($_SESSION['message_success'], 'Success');
        unset($_SESSION['message_success']);
      }
    }
    elseif($type == 3) {//1 = message_notification
      if(isset($_SESSION['message_notification'])) {
        show_message ($_SESSION['message_notification'], 'Notification');
        unset($_SESSION['message_notification']);
      }
    }
    elseif($type == 4) {//1 = message_error
      if(isset($_SESSION['message_error'])) {
        show_message ($_SESSION['message_error'], 'Error');
        unset($_SESSION['message_error']);
      }
    }
  }
}
function resize_image ($img, $type){//$img = basename.extension
  if($type === 'avatar'){
    $dir = 'avatar';
    $new_width = 350;
    $new_height = 350;
  }
  if($type === 'bg') {
    $dir = 'bg';
    $new_width = 640;
    $new_height = 480;
  }
  $dir = __DIR__.'\uploads\\'.$dir.'\\';
  $path = $dir.$img;
  $tmp = explode('.', $img);
  $extension = strtolower(end($tmp));$tmp = explode('.', $img);
  $extension = strtolower(end($tmp));
  if($extension == 'jpg' || $extension == 'jpeg') {
    $image = imagecreatefromjpeg($path);
  }
  elseif($extension == 'png') {
    $image = imagecreatefrompng($path);
  }
  elseif($extension == 'gif') {
    $image = imagecreatefromgif($path);
  }
  $new_image = imagecreatetruecolor($new_width, $new_height);
  $image_width = imagesx($image);
  $image_height = imagesy($image);
  imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
  unlink($path);
  imagejpeg($new_image, $dir.'\\'.$img);
}
function upload_file ($file, $type) {
  if($type === 'avatar'){
    $dir = 'avatar';
  }
  if($type === 'bg') {
    $dir = 'bg';
  }
  $size = 500000;
  $errors = array();
  if($file['error']==4):
    $errors[] = '<div> You have not uploded any file !! </div>';
  else:
    if($file['size'] > $size):
      $errors[] = '<div> The image size is more than the value allowed </div>';
    endif;
    $allowed_extensions = array('jpg', 'png', 'jpeg', 'gif');
    $tmp = explode('.', $file['name']);
    $extension = strtolower(end($tmp));
    if(!in_array($extension, $allowed_extensions)):
      $errors[] = '<div> The file you tried to upload is not an image </div>';
    endif;
  endif;
  if(empty($errors)):
    $tmp = rand(0, 100000000000);
    $new_name = $tmp.'.'.$extension;
    move_uploaded_file($file['tmp_name'], __DIR__.'\uploads\\'.$dir.'\\'.$new_name);
    resize_image($new_name, $type);
    return $new_name;
  else:
    $_SESSION['message_error'] = '';
    foreach($errors as $error):
      $_SESSION['message_error'] .= $error . '<br>';
    endforeach;
  endif;
}