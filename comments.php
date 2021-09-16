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
function num_of_comments_blog($blog_id) {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM comments WHERE blog=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $blog_id
  ));
  $data = $reponse -> fetch();
  return $data[0];
}
function get_blog_comments($blog) {
  require('dbconnect.php');
  $query = "SELECT * FROM comments WHERE blog=? ORDER BY creation_date LIMIT 5 ";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $blog['id']
  ));
  $i = 0;
  while($data = $reponse -> fetch()) {
    $comment[$i]['id'] = $data['id'];
    $comment[$i]['author'] = $data['author'];
    $comment[$i]['content'] = $data['content'];
    $comment[$i]['blog'] = $data['blog'];
    $comment[$i]['creation_date'] = $data['creation_date'];
    $i = $i + 1;
  }
  if(isset($comment)) {
    return $comment;
  }
}