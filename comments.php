<?php
function get_comment($comment_id) {
  require('dbconnect.php');
  $query = "SELECT * FROM comments WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $comment_id
  ));
  $data = $reponse -> fetch();
  $comment['id'] = $data['id'];
  $comment['author'] = $data['author'];
  $comment['content'] = $data['content'];
  $comment['blog'] = $data['blog'];
  $comment['creation_date'] = $data['creation_date'];
  return $comment;
}
function num_of_comments($blog_id) {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM comments WHERE blog=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $blog_id
  ));
  $data = $reponse -> fetch();
  return $data[0];
}