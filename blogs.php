<?php
function get_blog($id) {
  require('dbconnect.php');
  $query = "SELECT * FROM blogs WHERE id=? AND pending = 0 ";
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
  $blog['pending'] = $data['pending'];
  $blog['views'] = $data['views'];
  return $blog;
}
function get_all_types_of_blog($id) {
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
  $blog['pending'] = $data['pending'];
  $blog['views'] = $data['views'];
  return $blog;
}
function get_user_blogs($user) {
  require('dbconnect.php');
  $query = "SELECT * FROM blogs WHERE author=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['id']
  ));
  $i = 0;
  while($data = $reponse -> fetch()) {
    $blog[$i]['id'] = $data['id'];
    $blog[$i]['title'] = $data['title'];
    $blog[$i]['author'] = $data['author'];
    if($data['category'] == 1) {
      $blog[$i]['category'] = 'technology';
    }
    elseif($data['category'] == 2) {
      $blog[$i]['category'] = 'self-development';
    }
    elseif($data['category'] == 3) {
      $blog[$i]['category'] = 'sport';
    }
    elseif($data['category'] == 4) {
      $blog[$i]['category'] = 'nature';
    }
    elseif($data['category'] == 5) {
      $blog[$i]['category'] = 'work';
    }
    elseif($data['category'] == 6) {
      $blog[$i]['category'] = 'school';
    }
    $blog[$i]['creation_date'] = $data['creation_date'];
    $blog[$i]['content'] = $data['content'];
    $blog[$i]['pending'] = $data['pending'];
    $i = $i + 1;
  }
  if(isset($blog)) {
    return $blog;
  }
}
function number_of_blogs() {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM blogs";
  $reponse = $pdo -> query($query);
  $data = $reponse -> fetch();
  return $data[0];
}
function number_of_user_blogs($user) {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM blogs WHERE author = ?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['id']
  ));
  $data = $reponse -> fetch();
  return $data[0];
}
function number_of_user_pending_blogs($user) {
  require('dbconnect.php');
  $query = "SELECT count(id) FROM blogs WHERE author = ? AND pending = 1";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['id']
  ));
  $data = $reponse -> fetch();
  return $data[0];
}
function blog_add ($blog) {
  require('dbconnect.php');
  $query = 
  "INSERT INTO blogs (title, content, category, pending, author, creation_date)
  VALUES (?, ?, ?, ?, ?, ?)";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(
    array(
      $blog['title'],
      $blog['content'],
      $blog['category'],
      $blog['pending'],
      $blog['author'],
      $blog['creation_date']
    )
  );
}
function last_blog_id() {
  require('dbconnect.php');
  $query = 'SELECT max(id) FROM blogs';
  $reponse = $pdo -> query($query);
  $data = $reponse -> fetch();
  return $data[0];
}
function blog_id_exists($blog_id) {
  require('dbconnect.php');
  $query = 'SELECT id FROM blogs';
  $reponse = $pdo -> query($query);
  $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
  for($i = 0; $i < count($data); $i++) {
    if(in_array($blog_id, $data[$i])) {
      return TRUE;
    }
  }
  return False;
}
function get_blogs($query) {
  require('dbconnect.php');
  $reponse = $pdo -> query($query);
  $i = 0;
  while($data = $reponse -> fetch()) {
    $blog[$i]['id'] = $data['id'];
    $blog[$i]['title'] = $data['title'];
    $blog[$i]['author'] = $data['author'];
    if($data['category'] == 1) {
      $blog[$i]['category'] = 'technology';
    }
    elseif($data['category'] == 2) {
      $blog[$i]['category'] = 'self-development';
    }
    elseif($data['category'] == 3) {
      $blog[$i]['category'] = 'sport';
    }
    elseif($data['category'] == 4) {
      $blog[$i]['category'] = 'nature';
    }
    elseif($data['category'] == 5) {
      $blog[$i]['category'] = 'work';
    }
    elseif($data['category'] == 6) {
      $blog[$i]['category'] = 'school';
    }
    $blog[$i]['creation_date'] = $data['creation_date'];
    $blog[$i]['content'] = $data['content'];
    $blog[$i]['pending'] = $data['pending'];
    $blog[$i]['views'] = $data['views'];
    $i = $i + 1;
  }
  if(isset($blog)) {
    return $blog;
  }
}
function number_of_categories_blogs($number_of_categories) {
  require('dbconnect.php');
  $i = 1;
  while ($i <= $number_of_categories) {
    $query = "SELECT count(id) FROM blogs WHERE category = ? AND pending = 0";
    $reponse = $pdo -> prepare($query);
    $reponse -> execute(array(
      $i
    ));
    $data = $reponse -> fetch();
    $numbers_of_categories_blogs[$i] =  $data[0];
    $i = $i + 1;
    $reponse -> closeCursor();
  }
  return $numbers_of_categories_blogs;
}
function add_view ($blog) {
  require('dbconnect.php');
  $query = 
  "UPDATE blogs SET views = ? WHERE id = ?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(
  array(
    $blog['views'], $blog['id']
  ));
}
function blog_exists ($id) {
  require('dbconnect.php');
  $query = "SELECT id FROM blogs";
  $reponse = $pdo -> query($query);
  while ($data = $reponse-> fetch()) {
    if(in_array($id, $data)) {
      return true;
    }
  }
  return false;
}
function update_blog_info ($blog) {
  require('dbconnect.php');
  $query = "UPDATE blogs SET title=?, content=?, category=? WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $blog['title'], $blog['content'], $blog['category'], $blog['id']
  ));
}
function delete_blog ($blog) {
  require('dbconnect.php');
  $query = "DELETE FROM blogs WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $blog['id']
  ));
}