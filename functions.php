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