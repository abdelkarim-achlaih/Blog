<?php
function sign_up ($user) {
  require('dbconnect.php');
  $query = 
  "INSERT INTO users (first_name, last_name, username, email, password, category, type, sign_in_date, gender)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $req = $pdo -> prepare($query);
  $req -> execute(
    array(
      $user['first_name'],
      $user['last_name'],
      $user['username'],
      $user['email'],
      $user['password'],
      $user['category'],
      $user['type'],
      $user['sign_in_date'],
      $user['gender'],
    )
  );
}
function user_exists_for_sign ($user) {
  require('dbconnect.php');
  $query = "SELECT username, email FROM users";
  $reponse = $pdo -> query($query);
  if(isset($user['username']) && isset($user['email'])) {
    while ($data = $reponse-> fetch()) {
      if(in_array($user['username'], $data) OR in_array($user['email'], $data)) {
        return true;
      }
    }
  }
  elseif(! isset($user['username'])) {
    while ($data = $reponse-> fetch()) {
      if(in_array($user['email'], $data)) {
        return true;
      }
    }
  }
  return false;
}
function email_exists_for_log_in ($user) {
  require('dbconnect.php');
  $query = "SELECT email FROM users";
  $reponse = $pdo -> query($query);
  while ($data = $reponse-> fetch()) {
    if(in_array($user['email'], $data)) {
      return true;
    }
  }
  return false;
}
function verify_password($user) {
  require('dbconnect.php');
  $query = "SELECT password FROM users WHERE email = ?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['email']
  ));
  $data = $reponse -> fetch();
  if($data['password'] == $user['password']) {
    return true;
  }
  return false;
}
function get_user_infos($user) {
  require('dbconnect.php');
  $query = "SELECT * FROM users WHERE email=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['email']
  ));
  $data = $reponse -> fetch();
  $user['id'] = $data['id'];
  $user['first_name'] = $data['first_name'];
  $user['last_name'] = $data['last_name'];
  $user['username'] = $data['username'];
  $user['password'] = $data['password'];
  $user['category'] = $data['category'];
  $user['type'] = $data['type'];
  $user['sign_in_date'] = $data['sign_in_date'];
  $user['gender'] = $data['gender'];
  return $user;
}
function get_user_infos_from_id($user_id) {
  require('dbconnect.php');
  $query = "SELECT * FROM users WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user_id
  ));
  $data = $reponse -> fetch();
  $user['id'] = $data['id'];
  $user['first_name'] = $data['first_name'];
  $user['last_name'] = $data['last_name'];
  $user['username'] = $data['username'];
  $user['password'] = $data['password'];
  $user['category'] = $data['category'];
  $user['type'] = $data['type'];
  $user['sign_in_date'] = $data['sign_in_date'];
  $user['gender'] = $data['gender'];
  return $user;
}
function update_user_info($user) {
  require('dbconnect.php');
  $query = "UPDATE users SET first_name=?, last_name=?, password=?, category=?, gender=? WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['first_name'], $user['last_name'], $user['password'], $user['category'], $user['gender'], $user['id']
  ));
}

function delete_user($user) {
  require('dbconnect.php');
  $query = "DELETE FROM users WHERE id=?";
  $reponse = $pdo -> prepare($query);
  $reponse -> execute(array(
    $user['id']
  ));
}
function user_exists ($id) {
  require('dbconnect.php');
  $query = "SELECT id FROM users";
  $reponse = $pdo -> query($query);
  while ($data = $reponse-> fetch()) {
    if(in_array($id, $data)) {
      return true;
    }
  }
  return false;
}