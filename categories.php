<?php
function number_of_categories() {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM categories";
  $reponse = $pdo -> query($query);
  $data = $reponse -> fetch();
  return $data[0];
}
function get_category_infos($category_id) {
  require('dbconnect.php');
  $query = "SELECT * FROM categories WHERE id = ?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $category_id
  ));
  $data = $reponse -> fetch();
  $category['id'] = $data['id'];
  $category['name'] = $data['name'];
  return $category;
}
function get_category_infos_from_name($category_name) {
  require('dbconnect.php');
  $query = "SELECT * FROM categories WHERE name = ?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $category_name
  ));
  $data = $reponse -> fetch();
  $category['id'] = $data['id'];
  $category['name'] = $data['name'];
  return $category;
}