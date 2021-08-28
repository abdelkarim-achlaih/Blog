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