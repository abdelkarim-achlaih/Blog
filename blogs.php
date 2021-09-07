<?php

function get_blog($id) {
  require('dbconnect.php');
  $query = "SELECT * FROM blogs WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $id
  ));
  $data = $reponse -> fetch();
  $blog['id'] = $data['id'];
  $blog['title'] = $data['title'];
  $blog['author'] = $data['author'];
  if($data['category'] == 1) {
    $blog['category'] = 'technology';
  }
  elseif($data['category'] == 2) {
    $blog['category'] = 'self-development';
  }
  elseif($data['category'] == 3) {
    $blog['category'] = 'sport';
  }
  elseif($data['category'] == 4) {
    $blog['category'] = 'nature';
  }
  elseif($data['category'] == 5) {
    $blog['category'] = 'work';
  }
  elseif($data['category'] == 6) {
    $blog['category'] = 'school';
  }
  $blog['creation_date'] = $data['creation_date'];
  $blog['content'] = $data['content'];
  return $blog;
}
function number_of_blogs() {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM blogs";
  $reponse = $pdo -> query($query);
  $data = $reponse -> fetch();
  return $data[0];
}