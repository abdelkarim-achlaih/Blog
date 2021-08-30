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
function show_notification ($notification, $title) {
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
    <section class="notification-section">
      <div class="container">
        <div class="notification '.$color.'">
          <h4>'.$title.'</h4>
          <div class="notification-name">
  ';
  echo $notification ;
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